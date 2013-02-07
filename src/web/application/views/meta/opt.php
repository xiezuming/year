<?php
if (empty($meta_type))
{
	$target_action = 'create';
	$opt_name = 'Create';
	$meta_type = array('meta_type_name'=>'', 'meta_type_desc'=>'');
}
else
{
	$target_action = 'modify/'.$meta_type['meta_type_id'];
	$opt_name = 'Modify';
}

?>
<h2>
	<?php echo $opt_name?>
	Meta Data Type
</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('meta/'.$target_action) ?>

<table>
	<tr>
		<td><label for="meta_type_name">Type Name</label>
		</td>
		<td><input type="text" name="meta_type_name"
			value="<?php echo set_value('meta_type_name', $meta_type['meta_type_name']); ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="meta_type_desc">Type Description</label>
		</td>
		<td><input type="text" name="meta_type_desc"
			value="<?php echo set_value('meta_type_desc', $meta_type['meta_type_desc']); ?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit"
			value='<?php echo $opt_name?>' /> <input type="button" value="Back"
			onclick="window.location.href='<?php echo site_url('/meta/')?>'" /></td>
	</tr>
</table>

<?php echo '</form>' ?>

<p class='important'>
	<strong>Note: </strong>The field of 'Type Name' may be used in the
	code. Please modify it very carefully.
</p>
