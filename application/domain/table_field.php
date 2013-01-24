<?php
Class Table_field
{
	private $name;
	private $label;
	private $is_in_query;
	private $is_in_summary;
	private $validation_rule;
	private $view_style;
	private $roles_editable;

	public function __construct($init_data_arr)
	{
		$this->name = $init_data_arr['name'];
		$this->label = $init_data_arr['label'];

		$this->is_in_query = !isset($init_data_arr['is_in_query']) ? FALSE
		: $init_data_arr['is_in_query'];
		$this->is_in_summary = !isset($init_data_arr['is_in_summary']) ? FALSE
		: $init_data_arr['is_in_summary'];

		$this->validation_rule = !isset($init_data_arr['validation_rule']) ? ''
				: $init_data_arr['validation_rule'];
		$this->view_style = !isset($init_data_arr['view_style']) ? 'input'
				: $init_data_arr['view_style'];

		$this->roles_editable = !isset($init_data_arr['roles_editable']) ? array()
		: $init_data_arr['roles_editable'];

		if (!is_array($this->roles_editable))
		{
			throw new Exception('roles_editable must be a array. name='.$this->name);
		}
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_label()
	{
		return $this->label;
	}

	public function is_in_query()
	{
		return $this->is_in_query;
	}

	public function is_in_summary()
	{
		return $this->is_in_summary;
	}

	public function has_validation_rule()
	{
		return $this->validation_rule != '';
	}

	public function get_validation_rule()
	{
		return $this->validation_rule;
	}

	public function get_view_style()
	{
		return $this->view_style;
	}

	public function is_editable($role)
	{
		return in_array($role, $this->roles_editable);
	}
}