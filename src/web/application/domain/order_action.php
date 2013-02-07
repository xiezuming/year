<?php
Class Order_action
{
	private $name;
	private $label;
	private $type;
	private $roles;
	private $editable_fields;
	private $read_only_fields;
	private $callback_method_init;

	public function __construct($name, $label, $type, $roles, $editable_fields, $read_only_fields)
	{
		$this->name = $name;
		$this->label = $label;
		$this->type = $type;
		$this->roles = $roles;
		$this->editable_fields = $editable_fields;
		$this->read_only_fields = $read_only_fields;
		$this->callback_method_init = '';
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_label()
	{
		return $this->label;
	}

	public function get_type()
	{
		return $this->type;
	}

	public function is_authorized($role)
	{
		return in_array($role, $this->roles);
	}
	public function get_editable_fields()
	{
		return $this->editable_fields;
	}

	public function get_read_only_fields()
	{
		return $this->read_only_fields;
	}

	public function set_callback_method_init($callback_method_init)
	{
		$this->callback_method_init = $callback_method_init;
	}

	public function get_callback_method_init()
	{
		return $this->callback_method_init;
	}
}
