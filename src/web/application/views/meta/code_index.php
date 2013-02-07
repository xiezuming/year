<h2>
	<?php echo 'Meta Type: '.$meta_type['meta_type_name'].' - '.$meta_type['meta_type_desc'] ?>
</h2>

<table class="gridtable">
	<tr>
		<th>Code Key</th>
		<th>Code Description</th>
		<th><?php echo create_img_tag('Create Code', 'create', '/meta/code_create/'.$meta_type['meta_type_id'])?>
			<?php echo create_img_tag('Back to Type List', 'back', '/meta/')?>
		</th>

	</tr>
	<?php foreach ($meta_codes as $meta_code): ?>
	<tr>
		<td><?php echo $meta_code['meta_code_key']?>
		</td>
		<td><?php echo $meta_code['meta_code_desc']?>
		</td>
		<td><?php echo create_img_tag('Modify', 'modify', '/meta/code_modify/'.$meta_code['meta_code_id']);?>
			<?php echo create_img_tag('Delete', 'delete', '/meta/code_delete/'.$meta_code['meta_code_id'], 
							'onclick = "return confirm(\'Are you sure you want to delete the code?\');"');?>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<br />
