<?php
class Meta extends CI_Controller {

	/**
	 * @var Meta_model
	 */
	var $meta_model;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('meta_model');
	}

	public function index()
	{
		$data['title'] = 'Type List - Meta Data';
		$data['meta_types'] =  $this->meta_model->get_meta_type_list();

		$this->load->view('templates/header', $data);
		$this->load->view('meta/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Type - Meta Data';

		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('meta_type_name', 'Type Name', 'required');
			$this->form_validation->set_rules('meta_type_desc', 'Type Description', 'required');

			if ($this->form_validation->run() === TRUE)
			{
				$this->meta_model->add_meta_type();
				$this->session->set_flashdata('falshmsg',
						array('type'=>'message', 'content'=>'The meta type has been created successfully.'));
				redirect(site_url("/meta/"), 'refresh');
				return;
			}
		}
		$this->load->view('templates/header', $data);
		$this->load->view('meta/opt');
		$this->load->view('templates/footer');
	}

	public function modify($meta_type_id)
	{
		$data['meta_type'] = $this->meta_model->get_meta_type($meta_type_id);
		if (empty($data['meta_type']))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('meta_type_name', 'Type Name', 'required');
		$this->form_validation->set_rules('meta_type_desc', 'Type Description', 'required');
			
		if ($this->form_validation->run())
		{
			$this->meta_model->modify_meta_type($meta_type_id);
			$this->session->set_flashdata('falshmsg',
					array('type'=>'message', 'content'=>'The meta type has been modified successfully.'));
			redirect(site_url("/meta/"), 'refresh');
		}

		$data['title'] = 'Modify Type - Meta Data';

		$this->load->view('templates/header', $data);
		$this->load->view('meta/opt', $data);
		$this->load->view('templates/footer');
	}

	public function delete($meta_type_id)
	{
		$data['meta_type'] = $this->meta_model->get_meta_type($meta_type_id);
		if (empty($data['meta_type']))
		{
			show_404();
		}

		$this->meta_model->delete_meta_type($meta_type_id);
		$this->session->set_flashdata('falshmsg',
				array('type'=>'message', 'content'=>'The meta type has been deleted successfully.'));
		redirect(site_url("/meta/"), 'refresh');
	}

	public function code_index($meta_type_id)
	{
		$data['meta_type'] = $this->meta_model->get_meta_type($meta_type_id);
		if (empty($data['meta_type']))
		{
			show_404();
		}

		$data['title'] = 'Code List - Meta Data';
		$data['meta_codes'] =  $this->meta_model->get_meta_code_list($meta_type_id);

		$this->load->view('templates/header', $data);
		$this->load->view('meta/code_index', $data);
		$this->load->view('templates/footer');
	}

	public function code_create($meta_type_id)
	{
		$data['meta_type'] = $this->meta_model->get_meta_type($meta_type_id);
		if (empty($data['meta_type']))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Code - Meta Data';

		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('meta_code_key', 'Code Key', 'required');
			$this->form_validation->set_rules('meta_code_desc', 'Code Description', 'required');

			if ($this->form_validation->run())
			{
				$this->meta_model->add_meta_code($meta_type_id);
				redirect(site_url("/meta/code_index/".$meta_type_id), 'refresh');
				return;
			}
		}
		$this->load->view('templates/header', $data);
		$this->load->view('meta/code_opt');
		$this->load->view('templates/footer');
	}

	public function code_modify($meta_code_id)
	{
		$data['meta_code'] = $this->meta_model->get_meta_code($meta_code_id);
		if (empty($data['meta_code']))
		{
			show_404();
		}
		$data['meta_type'] = $this->meta_model->get_meta_type($data['meta_code']['meta_type_id']);
		if (empty($data['meta_type']))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('meta_code_key', 'Code Key', 'required');
		$this->form_validation->set_rules('meta_code_desc', 'Code Description', 'required');
			
		if ($this->form_validation->run())
		{
			$this->meta_model->modify_meta_code($meta_code_id);
			redirect(site_url("/meta/code_index/".$data['meta_type']['meta_type_id']), 'refresh');
		}

		$data['title'] = 'Modify Code - Meta Data';

		$this->load->view('templates/header', $data);
		$this->load->view('meta/code_opt', $data);
		$this->load->view('templates/footer');
	}

	public function code_delete($meta_code_id)
	{
		$data['meta_code'] = $this->meta_model->get_meta_code($meta_code_id);
		if (empty($data['meta_code']))
		{
			show_404();
		}

		$this->meta_model->delete_meta_code($meta_code_id);
		redirect(site_url("/meta/code_index/".$data['meta_code']['meta_type_id']), 'refresh');
	}
}