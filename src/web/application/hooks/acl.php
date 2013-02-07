<?php
class Acl {

	private $url_controller;
	private $url_method;
	private $CI;

	function Acl()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');

		$this->url_controller = $this->CI->uri->segment(1);
		if (empty($this->url_controller))
		{
			$this->url_controller = 'home';
		}
		$this->url_method = $this->CI->uri->segment(2);
		if (empty($this->url_method))
		{
			$this->url_method = 'index';
		}
	}

	function auth()
	{
		if ($this->url_controller == 'login' || $this->url_controller == 'home')
		{
			return;
		}

		if($this->CI->session->userdata('USER'))
		{
			$user = $this->CI->session->userdata('USER');
			if (!$this->has_permission($user['role'], $this->url_controller, $this->url_method))
			{
				show_error('You do not have enough authorization.<br/>'.
						$this->url_controller.'.'.$this->url_method.'<br/>'.
						'<a href="'. site_url('login') .'">Login</a>');
			}
		}
		else
		{
			show_error('Login first.<a href="'. site_url('login') .'">Login</a>');
		}
	}

	private function has_permission($role, $controller, $method)
	{
		$this->CI->load->config('acl');
		$permissions = $this->CI->config->item('permission');
		return in_array($role, $permissions[$controller][$method]);
	}
}