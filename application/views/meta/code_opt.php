<?php
if (empty($meta_code))
{
	$target_action = 'code_create/'.$meta_type['meta_type_id'];
	$opt_name = 'Create';
	$meta_code = array('meta_code_key'=>'', 'meta_code_desc'=>'');
}
else
{
	$target_action = 'code_modify/'.$meta_code['meta_code_id'];
	$opt_name = 'Modify';
}
?>

<h2>
	<?php echo $opt_name.' Code'?>
</h2>
<p>

	<?php echo 'Meta Type: '.$meta_type['meta_type_name'].' - '.$meta_type['meta_type_desc'] ?>
</p>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('meta/'.$target_action) ?>

<table>
	<tr>
		<td><label for="meta_code_key">Code Key</label>
		</td>
		<td><input type="text" name="meta_code_key"
			value="<?php echo set_value('meta_code_key', $meta_code['meta_code_key']); ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="meta_code_desc">Code Description</label>
		</td>
		<td><input type="text" name="meta_code_desc"
			value="<?php echo set_value('meta_code_desc', $meta_code['meta_code_desc']); ?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit"
			value='<?php echo $opt_name?>' /> <input type="button" value="Back"
			onclick="window.location.href='<?php echo site_url('/meta/code_index/'.$meta_type['meta_type_id'])?>'" />
		</td>
	</tr>
</table>

<?php echo '</form>' ?>
