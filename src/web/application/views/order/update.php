<h2>
	<?php echo $action_label?>
</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('order/update/'.$action_name.'/'.$order['id'], 'onsubmit="return confirm(\'Are you sure you want to update?\');"') ?>

<?php
define('CELL_COUNT_PRE_ROW', 4);
$editable_field_cells = array();
/* @var $editable_field Table_field */
foreach ($editable_fields as $editable_field)
{
	array_push($editable_field_cells, '<label class="label_text">'.$editable_field->get_label().'</label>');
	array_push($editable_field_cells, create_field_input_tag($editable_field, $order[$editable_field->get_name()]));
}
$read_only_field_cells = array();
/* @var $read_only_field Table_field */
foreach ($read_only_fields as $read_only_field)
{
	array_push($read_only_field_cells, '<label class="label_text">'.$read_only_field->get_label().'</label>');
	array_push($read_only_field_cells, create_field_view_tag($read_only_field, $order[$read_only_field->get_name()], 'class="value_text"'));
}
?>

<?php 
if (count($editable_field_cells) > 0)
{
	?>
<table class="bordertable">
	<?php echo create_table_rows($editable_field_cells, CELL_COUNT_PRE_ROW)?>
</table>

<input type="submit"
	name="submit" value="Update" />
&nbsp;
<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />
<hr />
<?php
}
echo '</form>';
?>

<?php 
if (count($read_only_field_cells) > 0)
{
	?>

<table class="bordertable">
	<?php echo create_table_rows($read_only_field_cells, CELL_COUNT_PRE_ROW)?>
</table>

<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />
<?php 
}
?>

