<?php
Class Order_model extends CI_Model
{
	const TABLE_ORDER = 'salesrecord';
	const LIMIT_RECORD = 20;

	public function get_order_list($where_array)
	{
		$this->db->or_like($where_array);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(self::LIMIT_RECORD);
		$query = $this->db->get_where(self::TABLE_ORDER);
		log_message('debug', 'get_order_list: sql = '.$this->db->last_query());
		return $query->result_array();
	}

	public function get_order_list_where_clause($where_clause)
	{
		$query = $this->db->query("select * from ".self::TABLE_ORDER.' where '.$where_clause);
		log_message('debug', 'get_order_list_where_clause: sql = '.$this->db->last_query());
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