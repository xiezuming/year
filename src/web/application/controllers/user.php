<?php
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['title'] = 'User List';
		$data['users'] =  $this->user_model->get_user_list();

		$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create User';

		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

			if ($this->form_validation->run() === TRUE)
			{
				$this->user_model->add_user();
				redirect(site_url("/user/"), 'refresh');
				return;
			}
		}
		$this->load->view('templates/header', $data);
		$this->load->view('user/create');
		$this->load->view('templates/footer');
	}

	public function modify($id)
	{
		$data['user'] = $this->user_model->get_user($id);
		if (empty($data['user']))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
			
		if ($this->form_validation->run())
		{
			$this->user_model->modify_user($id);
			redirect(site_url("/user/"), 'refresh');
		}

		$data['title'] = 'Modify User';

		$this->load->view('templates/header', $data);
		$this->load->view('user/modify', $data);
		$this->load->view('templates/footer');
	}

	public function password($id)
	{
		$data['user'] = $this->user_model->get_user($id);
		if (empty($data['user']))
		{
			show_404();
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			
		if ($this->form_validation->run())
		{
			$this->user_model->set_password($id);
			redirect(site_url("/user/"), 'refresh');
		}

		$data['title'] = 'Set Password';

		$this->load->view('templates/header', $data);
		$this->load->view('user/password', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$data['user'] = $this->user_model->get_user($id);
		if (empty($data['user']))
		{
			show_404();
		}

		$this->user_model->delete_user($id);
		redirect(site_url("/user/"), 'refresh');
	}
}