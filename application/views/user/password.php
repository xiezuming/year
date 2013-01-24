<h2>Set Password</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('user/password/'.set_value('id', $user['id'])) ?>

<table>
	<tr>
		<td><label for="username">User Name</label>
		</td>
		<td><label class="value_text"><?php echo $user['username'] ?> </label>
		</td>
	</tr>
	<tr>
		<td><label for="usertype">Role</label>
		</td>
		<td><label class="value_text"><?php echo meta_code_desc('role', $user['role']) ?>
		</label>
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
		<td colspan="2"><input type="submit" name="submit" value="Set" /> <input
			type="button" value="Back"
			onclick="window.location.href='<?php echo site_url('/user/')?>'" /></td>
	</tr>
</table>

<?php echo '</form>' ?>
