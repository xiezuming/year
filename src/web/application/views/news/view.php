<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];
?>
<p>
	<?php echo anchor('/news/', 'Back')?>
</p>
