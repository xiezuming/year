<?php
Class User_model extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('id, username, role');
		$this -> db -> from('user');
		$this -> db -> where('username = ' . "'" . $username . "'");
		$this -> db -> where('password = ' . "'" . MD5($password) . "'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_user_list()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function get_user($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return  $query->row_array();
	}

	public function add_user()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => MD5($this->input->post('password')),
				'role' => $this->input->post('role')
		);

		return $this->db->insert('user', $data);
	}

	public function modify_user($id)
	{
		$data = array(
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role')
		);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function set_password($id)
	{
		$data = array(
				'password' => MD5($this->input->post('password'))
		);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user', $data);
	}
}
?>