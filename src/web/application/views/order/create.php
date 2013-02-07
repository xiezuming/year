<h2>
	<?php echo $action_label?>
</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('order/create/'.$action_name, 'onsubmit="return confirm(\'Are you sure you want to create?\');"') ?>

<?php
$editable_field_cells = array();
/* @var $editable_field Table_field */
foreach ($editable_fields as $editable_field)
{
	array_push($editable_field_cells, '<label class="label_text">'.$editable_field->get_label().'</label>');
	$default_value = array_key_exists($editable_field->get_name(), $order_init_data) ? $order_init_data[$editable_field->get_name()] : '';
	array_push($editable_field_cells, create_field_input_tag($editable_field, $default_value));
}
$read_only_field_cells = array();
/* @var $read_only_field Table_field */
foreach ($read_only_fields as $read_only_field)
{
	array_push($read_only_field_cells, '<label class="label_text">'.$read_only_field->get_label().'</label>');
	$default_value = array_key_exists($read_only_field->get_name(), $order_init_data) ? $order_init_data[$read_only_field->get_name()] : '';
	array_push($read_only_field_cells, create_field_view_tag($read_only_field, $default_value, 'class="value_text"'));
	array_push($read_only_field_cells, create_field_input_tag($read_only_field, $default_value, true));
}
?>

<table class="bordertable">
	<?php echo create_table_rows($editable_field_cells, 4)?>
</table>

<input type="submit"
	name="submit" value="Create" />
&nbsp;
<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />
<hr />

<table class="bordertable">
	<?php echo create_table_rows($read_only_field_cells, 6)?>
</table>

<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />

<?php echo '</form>' ?>
