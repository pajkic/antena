
<?php foreach ($data as $d):?>
	<h3><a href = "/post/<?php echo $d['id'];?>"><?php echo $d['title'];?></a></h3>
	<small><?php echo date('d. m. Y.',strtotime($d['date']));?></small>	
	<div class="news_info"> 
		<img src="<?php echo $d['image'];?>" />
		<p><?php echo $d['excerpt'];?></p>
	</div>
<?php endforeach; ?>