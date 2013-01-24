<h2>Order Detail Information</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('order/modify/'.$order['id']) ?>

<?php
define('CELL_COUNT_PRE_ROW', 4);
$cells = array();
/* @var $table_field Table_field */
foreach ($table_field_arr as $table_field)
{
	array_push($cells, '<label for="'.$table_field->get_name().'">'.$table_field->get_label().'</label>');
	if ($table_field->is_editable($role))
		array_push($cells, create_field_input_tag($table_field, $order[$table_field->get_name()]));
	else
		array_push($cells, create_field_view_tag($table_field, $order[$table_field->get_name()], 'class="value_text"'));
}
?>
<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />
<table class="bordertable">
	<?php echo create_table_rows($cells, CELL_COUNT_PRE_ROW)?>
</table>
<?php if ($role != 'V'){ 
	echo '<input type="submit" name="submit" value="Modify" />';
}?>&nbsp;
<input
	type="button" value="Back"
	onclick="window.location.href='<?php echo site_url('/order/index/1')?>'" />

<?php echo '</form>' ?>
