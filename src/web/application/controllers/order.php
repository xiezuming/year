<?php
/**
 * @property Order_model $order_model
 * @property Order_meta_data_model $order_meta_data_model
 * @property Log_model $log_model
 */
class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('order_meta_data_model');
		$this->load->model('log_model');
	}

	public function index($requery = FALSE)
	{
		$user = $this->session->userdata('USER');

		$this->load->helper('form');

		$data['title'] = 'Order List';
		$data['order_actions'] = $this->order_meta_data_model->get_supported_actions($user['role']);
		$data['query_conditions_fields'] = $this->order_meta_data_model->get_query_conditions_fields();
		$data['summery_fields'] = $this->order_meta_data_model->get_summary_fields();

		if ($requery)
		{
			$query_id = $this->session->userdata('LAST_ORDER_QUERY_WHERE');
		}
		else
		{
			$query_id = $this->input->post("query_id");
		}
		if($this->input->post('submit') || $requery)
		{
			$where = $this->create_where($query_id);
			$data['orders'] =  $this->order_model->get_order_list($where);
			$this->session->set_userdata('LAST_ORDER_QUERY_WHERE', $query_id);
		}
		$data['query_id'] = $query_id;

		$this->load->view('templates/header', $data);
		$this->load->view('order/index', $data);
		$this->load->view('templates/footer');
	}

	public function update($action_name, $id)
	{
		$order_action = $this->order_meta_data_model->get_order_action($action_name);
		if (!isset($order_action))
		{
			show_404();
		}
		$data['order_action'] = $order_action;

		$user = $this->session->userdata('USER');
		$user_role = $user['role'];
		if (!$order_action->is_authorized($user_role))
		{
			show_404();
		}

		$data['order'] = $this->order_model->get_order($id);
		if (!isset($data['order']))
		{
			show_404();
		}

		$data['action_name'] = $order_action->get_name();
		$data['action_label'] = $order_action->get_label();
		$data['editable_fields'] = $order_action->get_editable_fields();
		$data['read_only_fields'] = $order_action->get_read_only_fields();

		$this->load->helper('form');
		$this->load->library('form_validation');

		if($this->input->post('submit'))
		{
			$modify_data = array();
			$rules = array();
			/* @var $table_field Table_field */
			foreach ($order_action->get_editable_fields() as $table_field)
			{
				$field_name = $table_field->get_name();
				$modify_data[$field_name] = $this->get_post_field_value($field_name);
				array_push($rules, array
				(
				'field' => $table_field->get_name(),
				'label' => $table_field->get_label(),
				'rules' => $table_field->get_validation_rule(),
				));
			}

			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run())
			{
				// database
				$this->order_model->modify_order($id, $modify_data);
				// log
				$this->log_model->insert(
						$this->get_username(),
						'order_'.$order_action->get_name(),
						$id,
						print_r($modify_data, TRUE));

				$this->session->set_flashdata('falshmsg',
						array('type'=>'message', 'content'=>'The record has been updated successfully.'));
				redirect(site_url("/order/update/".$action_name.'/'.$id), 'refresh');
			}
		}

		$data['title'] = $order_action->get_label();

		$this->load->view('templates/header', $data);
		$this->load->view('order/update', $data);
		$this->load->view('templates/footer');
	}

	public function create($action_name, $id='')
	{
		$order_action = $this->order_meta_data_model->get_order_action($action_name);
		if (!isset($order_action))
		{
			show_404();
		}
		$data['order_action'] = $order_action;

		$user = $this->session->userdata('USER');
		$user_role = $user['role'];
		if (!$order_action->is_authorized($user_role))
		{
			show_404();
		}

		$data['action_name'] = $order_action->get_name();
		$data['action_label'] = $order_action->get_label();
		$data['editable_fields'] = $order_action->get_editable_fields();
		$data['read_only_fields'] = $order_action->get_read_only_fields();

		$this->load->helper('form');
		$this->load->library('form_validation');

		if(!$this->input->post('submit'))
		{
			// initial job for create
			if ($id != '')
			{
				$order_init_data = $this->order_model->get_order($id);
				if (!isset($order_init_data))
				{
					show_404();
				}
			}
			else
			{
				$order_init_data = array();
			}

			if ($order_action->get_callback_method_init() != '')
			{
				$order_init_data = call_user_func(array($this, $order_action->get_callback_method_init()),
						$order_init_data);
			}

			$data['order_init_data'] = $order_init_data;
		}
		else
		{
			$insert_data = array();
			$rules = array();
			/* @var $table_field Table_field */
			foreach ($order_action->get_editable_fields() as $table_field)
			{
				$field_name = $table_field->get_name();
				$insert_data[$field_name] = $this->get_post_field_value($field_name);
				array_push($rules, array
				(
				'field' => $table_field->get_name(),
				'label' => $table_field->get_label(),
				'rules' => $table_field->get_validation_rule(),
				));
			}
			$order_init_data = array();
			/* @var $table_field Table_field */
			foreach ($order_action->get_read_only_fields() as $table_field)
			{
				$field_name = $table_field->get_name();
				$field_value = $this->get_post_field_value($field_name);
				$insert_data[$field_name] = $field_value;
				$order_init_data[$field_name] = $field_value;
			}

			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run())
			{
				// database
				$id = $this->order_model->insert_order($insert_data);
				// log
				$this->log_model->insert(
						$this->get_username(),
						'order_'.$order_action->get_name(),
						$id,
						print_r($insert_data, TRUE));

				$this->session->set_flashdata('falshmsg',
						array('type'=>'message', 'content'=>'The record has been created successfully.'));
				redirect(site_url('/order/index/1'), 'refresh');
			}

			$data['order_init_data'] = $order_init_data;
		}

		$data['title'] = $order_action->get_label();

		$this->load->view('templates/header', $data);
		$this->load->view('order/create', $data);
		$this->load->view('templates/footer');
	}

	private function create_where($query_id)
	{
		$where_arr = array();
		if (isset($query_id) && $query_id != '')
		{
			/* @var $query_conditions_field Table_field */
			foreach ($this->order_meta_data_model->get_query_conditions_fields() as $query_conditions_field)
			{
				$where_arr[$query_conditions_field->get_name()] = $query_id;
			}
		}
		return $where_arr;
	}

	private function get_post_field_value($field_name)
	{
		$field_value = $this->input->post($field_name);
		return empty($field_value) ? NULL : $field_value;
	}

	private function get_username()
	{
		$username = '';
		if($this->session->userdata('USER'))
		{
			$user = $this->session->userdata('USER');
			$username = $user['username'];
		}
		return $username;
	}

	private function callback_create_pruchase($order_init_data)
	{
		$order_init_data['poLine'] = $order_init_data['poLine'] + 1;
		$empty_field_name_arr = array(
				'salePrice',
				'quantity',
				'orderStatus',
				'cost',
				'email',
				'creditcard',
				'orderNum',
				'source',
				'tax',
				'returnStatus',
				'buyerRefund',
				'sellerRefund',
				'lastUpdated',
				'carrier',
				'trackingNum',
		);
		foreach ($empty_field_name_arr as $empty_field_name)
		{
			$order_init_data[$empty_field_name] = '';
		}
		return $order_init_data;
	}
}