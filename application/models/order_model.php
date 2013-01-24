<?php
Class Order_model extends CI_Model
{
	const TABLE_ORDER = 'salesrecord';
	const LIMIT_RECORD = 20;

	public function get_order_list($where)
	{
		$this->db->order_by('id');
		$query = $this->db->get_where(self::TABLE_ORDER, $where, self::LIMIT_RECORD);
		return $query->result_array();
	}

	public function get_order($id)
	{
		$query = $this->db->get_where(self::TABLE_ORDER, array('id' => $id));
		return $query->row_array();
	}

	public function modify_order($id, $modify_field_name_arr)
	{
		$data = array();

		foreach ($modify_field_name_arr as $modify_field_name)
		{
			$value = $this->input->post($modify_field_name);
			$value  = empty($value) ? NULL : $value;
			$data[$modify_field_name] = $value;
		}
			
		$this->db->where('id', $id);
		$this->db->update(self::TABLE_ORDER, $data);
	}

}
?>