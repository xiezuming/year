<?php
Class Table_field
{
	private $name;
	private $label;
	private $validation_rule;
	private $view_style;

	public function __construct($init_data_arr)
	{
		$this->name = $init_data_arr['name'];
		$this->label = $init_data_arr['label'];

		$this->validation_rule = !isset($init_data_arr['validation_rule']) ? ''
				: $init_data_arr['validation_rule'];
		$this->view_style = !isset($init_data_arr['view_style']) ? 'input'
				: $init_data_arr['view_style'];
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_label()
	{
		return $this->label;
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
}