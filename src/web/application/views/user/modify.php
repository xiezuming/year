<h2>Modify User</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('user/modify/'.set_value('id', $user['id'])) ?>

<table>
	<tr>
		<td><label for="username">User Name</label>
		</td>
		<td><input type="text" name="username"
			value="<?php echo set_value('username', $user['username']) ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="usertype">User Type</label>
		</td>
		<td><?php echo form_dropdown('role', meta_code_array('role'), set_value('role', $user['role'])); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Modify" /> <input
			type="button" value="Back"
			onclick="window.location.href='<?php echo site_url('/user/')?>'" /></td>
	</tr>
</table>

<?php echo '</form>' ?>
