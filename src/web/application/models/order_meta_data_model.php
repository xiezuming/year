<?php
require_once(APPPATH.'domain/order_action.php');
require_once(APPPATH.'domain/table_field.php');

Class Order_meta_data_model extends CI_Model
{

	private static $order_actions;
	private static $order_fields;
	private static $query_conditions_fields;
	private static $summary_fields;

	public function get_order_actions()
	{
		if (!isset(self::$order_actions))
		{
			$this->load->config('order_meta_data');
			$actons_init_data = $this->config->item('order_actions');
			$actions = array();
			foreach ($actons_init_data as $action_init_data)
			{
				$all_fields = $this->get_order_fields();

				$editable_fields = array();
				foreach ($action_init_data['editable_fields'] as $editable_field_name)
				{
					$editable_fields[$editable_field_name] = $all_fields[$editable_field_name];
				}

				$read_only_fields = array();
				foreach ($action_init_data['read_only_fields'] as $read_only_field_name)
				{
					$read_only_fields[$read_only_field_name] = $all_fields[$read_only_field_name];
				}

				$action = new Order_action
				(
						$action_init_data['name'],
						$action_init_data['label'],
						$action_init_data['type'],
						$action_init_data['roles'],
						$editable_fields,
						$read_only_fields
				);

				if (array_key_exists('callback_method_init', $action_init_data))
				{
					$action->set_callback_method_init($action_init_data['callback_method_init']);
				}

				$actions[$action->get_name()] = $action;
			}

			self::$order_actions = $actions;
		}
		return self::$order_actions;
	}

	public function get_supported_actions($role)
	{
		$order_actions = $this->get_order_actions();
		$supported_actions = array();
		foreach ($order_actions as $action_name => $action)
		{
			if ($action->is_authorized($role))
			{
				$supported_actions[$action_name] = $action;
			}
		}
		return $supported_actions;
	}

	public function get_order_action($action_name)
	{
		$order_actions = $this->get_order_actions();
		if (array_key_exists($action_name, $order_actions))
		{
			return $order_actions[$action_name];
		}
		return NULL;
	}

	public function get_query_conditions_fields()
	{
		if (!isset(self::$query_conditions_fields))
		{
			$this->load->config('order_meta_data');
			$query_conditions_field_names = $this->config->item('query_conditions_field_names');
			$all_fields = $this->get_order_fields();

			$query_conditions_fields = array();
			foreach ($query_conditions_field_names as $query_conditions_field_name)
			{
				$query_conditions_fields[$query_conditions_field_name] = $all_fields[$query_conditions_field_name];
			}

			self::$query_conditions_fields = $query_conditions_fields;
		}
		return self::$query_conditions_fields;
	}

	public function get_summary_fields()
	{
		if (!isset(self::$summary_fields))
		{
			$this->load->config('order_meta_data');
			$summary_field_names = $this->config->item('summary_field_names');
			$all_fields = $this->get_order_fields();

			$summary_fields = array();
			foreach ($summary_field_names as $summary_field_name)
			{
				$summary_fields[$summary_field_name] = $all_fields[$summary_field_name];
			}

			self::$summary_fields = $summary_fields;
		}
		return self::$summary_fields;
	}

	private function get_order_fields()
	{
		if (!isset(self::$order_fields))
		{
			$this->load->config('order_meta_data');
			$fields_init_data = $this->config->item('order_fields');
			$fields = array();
			foreach ($fields_init_data as $field_init_data)
			{
				$field = new Table_field($field_init_data);
				$fields[$field->get_name()] = $field;
			}

			self::$order_fields = $fields;
		}
		return self::$order_fields;
	}

}
