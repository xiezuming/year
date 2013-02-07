<html>
<head>
<title>Happitail Customer Service System</title>
<link rel="stylesheet" href="<?php echo base_url("css/mystyle.css")?>">
</head>
<body id="content">
	<h1>Welcome to Happitail Customer Service System</h1>

	<?php echo validation_errors('<div class="critical">', '</div>'); ?>

	<?php echo form_open('login/verify'); ?>

	<table>
		<tr>
			<td><label for="username">Username:</label>
			</td>
			<td><input type="text" size="20" id="username" name="username"
				value="<?php echo set_value('username'); ?>" /></td>
		</tr>
		<tr>
			<td><label for="password">Password:</label>
			</td>
			<td><input type="password" size="20" id="passowrd" name="password" />
			</td>
		</tr>
	</table>
	<input type="submit" value="Login" />

	<?php echo '</form>'?>