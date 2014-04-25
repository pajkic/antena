<div class="news_block" id="block_<?php echo $block['id']?>">

<?php if ($block['heading'] == 1): ?>
<div class="block_title"><?php echo $block_title;?></div>
<?php endif; ?>	
	
<?php foreach ($data as $d):?>
	<div class="news_info col-lg-5"> 
		<a href = "/post/<?php echo $d['id']; ?>/<?php echo urlencode($d['title']); ?>/lang/<?php echo Yii::app()->language; ?>">
	<small><?php echo $d['date']; ?></small>
	<h3><?php echo $d['title']; ?> </h3>
	<img class="img-responsive" src="<?php echo $d['image']; ?>" />
		<p><?php echo $d['excerpt']; ?></p>
		</a>
	</div>
<?php endforeach; ?>
</div>