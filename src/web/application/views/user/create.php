<h2>Create User</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('user/create') ?>

<table>
	<tr>
		<td><label for="username">User Name</label>
		</td>
		<td><input type="text" name="username"
			value="<?php echo set_value('username'); ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="role">Role</label>
		</td>
		<td><?php echo form_dropdown('role', meta_code_array('role'), set_value('role'));?>
		</td>
	</tr>
	<tr>
		<td><label for="text">Password</label>
		</td>
		<td><input type="password" name="password"
			value="<?php echo set_value('password'); ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="text">Password Confirmation</label>
		</td>
		<td><input type="password" name="passconf"
			value="<?php echo set_value('passconf'); ?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Create" />
			<input type="button" value="Back"
			onclick="window.location.href='<?php echo site_url('/user/')?>'" /></td>
	</tr>
</table>

<?php echo '</form>' ?>
