<?php foreach ($news as $news_item): ?>
<li><?php echo anchor('/news/'.$news_item['id'], $news_item['title'])?>
</li>
<?php endforeach ?>

<?php echo anchor('/news/create', 'Create article')?>