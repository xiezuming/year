
<script
	type="text/javascript" src="<?php echo base_url('/js/jquery.js')?>"></script>
<script
	type="text/javascript"
	src="<?php echo base_url('/js/jquery.dataTables.min.js')?>"></script>
<script
	type="text/javascript"
	src="<?php echo base_url('/js/FixedColumns.min.js')?>"></script>

<?php echo form_open('order/') ?>
<?php 
define('CELL_COUNT_PRE_ROW', 6);
$query_cells = array();
/* @var $table_field Table_field */
foreach ($table_field_arr as $table_field)
{
	if ($table_field->is_in_query())
	{
		array_push($query_cells, $table_field->get_label());
		$default_value = isset($query[$table_field->get_name()])?$query[$table_field->get_name()]:'';
		array_push($query_cells, create_field_input_tag($table_field, $default_value));
	}
}
?>
<table class="bordertable">
	<?php echo create_table_rows($query_cells, CELL_COUNT_PRE_ROW)?>
	<tr>
		<td colspan="<?php echo CELL_COUNT_PRE_ROW ?>" align="right"><input
			type="submit" name="submit" value="Query" class="btn" />
		</td>
	</tr>
</table>

<?php echo '</form>' ?>
<br />

<?php if (!isset($orders) || count($orders) == 0)
{
	?>
<table id="ordertable" class="datatable">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<?php 
}
else
{
	?>
<table id="ordertable" class="datatable">
	<thead>
		<tr>
			<th></th>
			<?php 
			/* @var $table_field Table_field */
			foreach ($table_field_arr as $table_field)
			{
				if ($table_field->is_in_summary())
				{
					echo '<th>'.$table_field->get_label() .'</th>';
				}
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(isset($orders))
		{
			foreach ($orders as $order)
			{
				echo '<tr><td>';
				echo create_img_tag('Detail', 'modify', '/order/modify/'.$order['id']);
				echo '</td>';
				/* @var $table_field Table_field */
				foreach ($table_field_arr as $table_field)
				{
					if ($table_field->is_in_summary())
					{
						echo '<td>'.$order[$table_field->get_name()].'</td>';
					}
				}
				echo '</tr>';
			}
	} ?>
	</tbody>

</table>
<?php 
}
?>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var oTable = $('#ordertable').dataTable( {
					"sScrollY": 300,
					"sScrollX": "100%",
					//"bScrollCollapse": true,
					"sDom": 'lfr<"fixed_height"t>ip',
					"bPaginate": false,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": true
				} );
				new FixedColumns( oTable );
				
			} );
		</script>
