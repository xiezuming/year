<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->view('login_view');
		$this->load->view('templates/footer');
	}

	function verify()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed. User redirected to login page
			$this->load->view('login_view');
			$this->load->view('templates/footer');
		}
		else
		{
			//Go to private area
			redirect('home', 'refresh');
		}
	
	}
	
	function check_database($password)
	{
		//Field validation succeeded.&nbsp; Validate against database
		$username = $this->input->post('username');
	
		//query the database
		$result = $this->user_model->login($username, $password);
	
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
						'id' => $row->id,
						'username' => $row->username,
						'role' => $row->role
				);
				$this->session->set_userdata('USER', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
}

?>