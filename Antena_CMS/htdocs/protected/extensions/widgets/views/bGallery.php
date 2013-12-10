<?php foreach ($data as $image):?>
	<a href="<?php echo $image['image'];?>">
		<img src="<?php echo $image['thumb'];?>" width="<?php echo $w;?>" height="<?php echo $h;?>" />
	</a>
<?php endforeach; ?>
	
