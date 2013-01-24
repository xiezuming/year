<?php 
foreach ($visible_menu_items as $visible_menu_item)
{
	echo '<h2><li>'.anchor($visible_menu_item['link'], $visible_menu_item['desc']).'</li></h2>';
}
?>
