<h2>Type List</h2>

<table class="gridtable">
	<tr>
		<th>Type Name</th>
		<th>Type Description</th>
		<th><?php echo create_img_tag('Create Type', 'create', '/meta/create/')?>
		</th>
	</tr>
	<?php foreach ($meta_types as $meta_type): ?>
	<tr>
		<td><?php echo $meta_type['meta_type_name']?>
		</td>
		<td><?php echo $meta_type['meta_type_desc']?>
		</td>
		<td><?php echo create_img_tag('View Code List', 'forward', '/meta/code_index/'.$meta_type['meta_type_id']);?>
			<?php echo create_img_tag('Modify', 'modify', '/meta/modify/'.$meta_type['meta_type_id']);?>
			<?php echo create_img_tag('Delete', 'delete', '/meta/delete/'.$meta_type['meta_type_id'], 
							'onclick = "return confirm(\'Are you sure you want to delete the type?\');"');?>
		</td>
	</tr>
	<?php endforeach ?>
</table>
