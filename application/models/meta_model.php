<?php
Class Meta_model extends CI_Model
{
	const TABLE_META_TYPE = 'meta_type';
	const TABLE_META_CODE = 'meta_code';

	public function get_meta_type_list()
	{
		$query = $this->db->get(self::TABLE_META_TYPE);
		return $query->result_array();
	}

	public function get_meta_type($meta_type_id)
	{
		$query = $this->db->get_where(self::TABLE_META_TYPE,
				array('meta_type_id' => $meta_type_id));
		return $query->row_array();
	}

	public function add_meta_type()
	{
		$data = array(
				'meta_type_name' => $this->input->post('meta_type_name'),
				'meta_type_desc' => $this->input->post('meta_type_desc')
		);

		return $this->db->insert(self::TABLE_META_TYPE, $data);
	}

	public function modify_meta_type($meta_type_id)
	{
		$data = array(
				'meta_type_name' => $this->input->post('meta_type_name'),
				'meta_type_desc' => $this->input->post('meta_type_desc')
		);

		$this->db->where('meta_type_id', $meta_type_id);
		$this->db->update(self::TABLE_META_TYPE, $data);
	}

	public function delete_meta_type($meta_type_id)
	{
		$this->db->where('meta_type_id', $meta_type_id);
		$this->db->delete(self::TABLE_META_CODE);
		
		$this->db->where('meta_type_id', $meta_type_id);
		$this->db->delete(self::TABLE_META_TYPE);
	}

	public function get_meta_code_list($meta_type_id)
	{
		$query = $this->db->get_where(self::TABLE_META_CODE,
				array('meta_type_id' => $meta_type_id));
		return $query->result_array();
	}

	public function get_meta_code($meta_code_id)
	{
		$query = $this->db->get_where(self::TABLE_META_CODE,
				array('meta_code_id' => $meta_code_id));
		return $query->row_array();
	}

	public function add_meta_code($meta_type_id)
	{
		$data = array(
				'meta_type_id' => $meta_type_id,
				'meta_code_key' => $this->input->post('meta_code_key'),
				'meta_code_desc' => $this->input->post('meta_code_desc')
		);

		return $this->db->insert(self::TABLE_META_CODE, $data);
	}

	public function modify_meta_code($meta_code_id)
	{
		$data = array(
				'meta_code_key' => $this->input->post('meta_code_key'),
				'meta_code_desc' => $this->input->post('meta_code_desc')
		);

		$this->db->where('meta_code_id', $meta_code_id);
		$this->db->update(self::TABLE_META_CODE, $data);
	}

	public function delete_meta_code($meta_code_id)
	{
		$this->db->where('meta_code_id', $meta_code_id);
		$this->db->delete(self::TABLE_META_CODE);
	}

	public function get_meta_code_array_by_type($meta_type_name)
	{
		$query = $this->db->get_where(self::TABLE_META_TYPE,
				array('meta_type_name' => $meta_type_name));
		if ($query->num_rows() == 0)
		{
			return null;
		}
		$meta_type = $query->row_array();

		$query = $this->db->get_where(self::TABLE_META_CODE,
				array('meta_type_id' => $meta_type['meta_type_id']));
		$meta_codes = $query->result_array();
		$meta_code_array = array();
		foreach ($meta_codes as $meta_code)
		{
			$meta_code_array[$meta_code['meta_code_key']] = $meta_code['meta_code_desc'];
		}

		return $meta_code_array;
	}

	public function get_meta_code_desc($meta_type_name, $meta_code_key)
	{
		$query = $this->db->get_where(self::TABLE_META_TYPE,
				array('meta_type_name' => $meta_type_name));
		if ($query->num_rows() == 0)
		{
			return NULL;
		}
		$meta_type = $query->row_array();

		$query = $this->db->get_where(self::TABLE_META_CODE,
				array(
						'meta_type_id'  => $meta_type['meta_type_id'],
						'meta_code_key' => $meta_code_key));
		$meta_code = $query->row_array();
		if (!isset($meta_code) || count($meta_code) == 0)
		{
			return NULL;
		}
		return $meta_code['meta_code_desc'];
	}
}
?>