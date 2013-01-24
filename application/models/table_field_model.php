<?php
Class Table_field_model extends CI_Model
{
	public function get_table_field_list()
	{
		require_once(APPPATH.'domain/table_field.php');

		$this->load->config('table_field');
		$fields_init_data = $this->config->item('fields');
		$fields = array();
		foreach ($fields_init_data as $field_init_data)
		{
			$field = new Table_field($field_init_data);
			$fields[$field->get_name()] = $field;
		}

		return $fields;
	}
}
?>