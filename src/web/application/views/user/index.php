<h2>User List</h2>
<table class="gridtable">
	<tr>
		<th>User Name</th>
		<th>User Type</th>
		<th><?php echo create_img_tag('Create User', 'create', '/user/create/')?>
		</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['username']?>
		</td>
		<td><?php echo meta_code_desc('role', $user['role']) ?>
		</td>
		<td><?php echo create_img_tag('Modify', 'modify', '/user/modify/'.$user['id']);?>
			<?php echo create_img_tag('Set Password', 'password', '/user/password/'.$user['id']);?>
			<?php echo create_img_tag('Delete', 'delete', '/user/delete/'.$user['id'],
										'onclick = "return confirm(\'Are you sure you want to delete the user?\');"');?>
		</td>
	</tr>
	<?php endforeach ?>
</table>
