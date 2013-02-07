<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('USER'))
		{
			$data['title'] = 'Home';
			$data['visible_menu_items'] = $this->create_visible_menu_items();
			
			$this->load->view('templates/header', $data);
			$this->load->view('home_view', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('USER');
		session_destroy();
		redirect('home', 'refresh');
	}

	private function create_visible_menu_items()
	{
		$menu_items = array(
				'order'=>array(
						'desc' => 'Order Management',
						'link' => '/order/',
						'roles' => array('A', 'N', 'V')),
				'user'=>array(
						'desc' => 'User Management',
						'link' => '/user/',
						'roles' => array('A')),
				'meta'=>array(
						'desc' => 'Meta Data Management',
						'link' => '/meta/',
						'roles' => array('A')),
		);
		$user = $this->session->userdata('USER');
		$role = $user['role'];
		$visible_menu_items = array();
		
		foreach ($menu_items as $menu_item)
		{
			if (in_array($role, $menu_item['roles']))
			{
				array_push($visible_menu_items, $menu_item);
			}
		}
		
		return $visible_menu_items;
	}
}

?>
