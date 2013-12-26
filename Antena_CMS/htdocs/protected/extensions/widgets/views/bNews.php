<div class="news_block">

<?php if ($block['heading'] == 1): ?>
<div class="block_title"><?php echo $block_title;?></div>
<?php endif; ?>	
	
<?php foreach ($data as $d):?>
	<h3><a href = "/post/<?php echo $d['id']; ?>/<?php echo urlencode($d['title']); ?>/lang/<?php echo Yii::app()->language; ?>"><?php echo $d['title']; ?></a></h3>
	<small><?php echo $d['date']; ?></small>	
	<div class="news_info"> 
		<img src="<?php echo $d['image']; ?>" />
		<p><?php echo $d['excerpt']; ?></p>
	</div>
<?php endforeach; ?>
</div>