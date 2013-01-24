<?php
/**
 * @property Order_model $order_model
 * @property Table_field_model $table_field_model
 */
class Order extends CI_Controller {

	var $table_field_arr;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('table_field_model');
		$this->table_field_arr = $this->table_field_model->get_table_field_list();
	}

	public function index($requery = FALSE)
	{
		$this->load->helper('form');

		$data['title'] = 'Order List';
		$data['table_field_arr'] = $this->table_field_arr;

		if ($requery)
		{
			$where = $this->session->userdata('LAST_ORDER_QUERY_WHERE');
			$data['orders'] =  $this->order_model->get_order_list($where);
		}
		else{
			$where = $this->create_where();
			if($this->input->post('submit'))
			{
				$data['orders'] =  $this->order_model->get_order_list($where);
				$this->session->set_userdata('LAST_ORDER_QUERY_WHERE', $where);
			}
		}
		$data['query'] = $where;

		$this->load->view('templates/header', $data);
		$this->load->view('order/index', $data);
		$this->load->view('templates/footer');
	}

	public function modify($id)
	{
		$data['order'] = $this->order_model->get_order($id);
		if (empty($data['order']))
		{
			show_404();
		}

		$user = $this->session->userdata('USER');
		$user_role = $user['role'];
		$this->load->helper('form');
		$this->load->library('form_validation');

		if($this->input->post('submit'))
		{
			$modify_field_name_arr = array();
			$rules = array();
			/* @var $table_field Table_field */
			foreach ($this->table_field_arr as $table_field)
			{
				if ($table_field->is_editable($user_role))
				{
					array_push($modify_field_name_arr, $table_field->get_name());
					array_push($rules, array
					(
					'field' => $table_field->get_name(),
					'label' => $table_field->get_label(),
					'rules' => $table_field->get_validation_rule(),
					));
				}
			}

			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run())
			{
				$this->order_model->modify_order($id, $modify_field_name_arr);
				redirect(site_url("/order/modify/".$id), 'refresh');
			}
		}

		$data['title'] = 'Order Detail Information';
		$data['table_field_arr'] = $this->table_field_arr;
		$data['role'] = $user_role;

		$this->load->view('templates/header', $data);
		$this->load->view('order/detail', $data);
		$this->load->view('templates/footer');
	}

	private function create_where()
	{
		$where_arr = array();
		/* @var $table_field Table_field */
		foreach ($this->table_field_arr as $table_field)
		{
			if ($table_field->is_in_query())
			{
				$input = $this->input->post($table_field->get_name());
				if (isset($input) && $input!='')
				{
					$where_arr[$table_field->get_name()] = $input;
				}
			}
		}
		return $where_arr;
	}

	private function create_modify_field_name_arr($user_role)
	{
		$modify_field_name_arr = array();
		/* @var $table_field Table_field */
		foreach ($this->table_field_arr as $table_field)
		{
			if ($table_field->is_editable($user_role))
			{
				array_push($modify_field_name_arr, $table_field->get_name());
			}
		}
		return $modify_field_name_arr;
	}
}