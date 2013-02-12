<?php
Class Order_model extends CI_Model
{
	const TABLE_ORDER = 'salesrecord';
	const LIMIT_RECORD = 20;

	public function get_order_list($where)
	{
		$this->db->or_where($where);
		$this->db->order_by('id');
		$this->db->limit(self::LIMIT_RECORD);
		$query = $this->db->get_where(self::TABLE_ORDER);
		return $query->result_array();
	}

	public function get_order($id)
	{
		$query = $this->db->get_where(self::TABLE_ORDER, array('id' => $id));
		return $query->row_array();
	}

	public function modify_order($id, $modify_data)
	{
		$this->db->where('id', $id);
		$this->db->update(self::TABLE_ORDER, $modify_data);
	}

	public function insert_order($insert_data)
	{
		$this->db->insert(self::TABLE_ORDER, $insert_data);
		return $this->db->insert_id();
	}
}
?>