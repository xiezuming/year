<?php
Class Log_model extends CI_Model
{
	const TABLE_LOG = 'log';

	function insert($user, $action, $document_id, $desc = '')
	{
		$data = array(
				'log_user' => $user,
				'log_action' => $action,
				'log_document_id' => $document_id,
				'log_desc' => $desc,
		);
		$this->db->set('log_time', 'NOW()', FALSE);
		$this->db->insert(self::TABLE_LOG, $data);
	}
}
?>