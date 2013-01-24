<h2>Create a news item</h2>

<?php echo validation_errors('<div class="critical">', '</div>'); ?>

<?php echo form_open('news/create') ?>

<table>
	<tr>
		<td><label for="title">Title</label>
		</td>
		<td><input type="text" name="title"
			value="<?php echo set_value('title'); ?>" />
		</td>
	</tr>
	<tr>
		<td><label for="text">Text</label>
		</td>
		<td><textarea name="text"><?php echo set_value('text'); ?></textarea>
		</td>
	</tr>
</table>
<input
	type="submit" name="submit" value="Create news item" />

<?php echo '</form>' ?>
<?php echo anchor('/news/', 'Back')?>