
<?php foreach ($data as $d):?>
	<h1><a href = "/post/<?php echo $d['id'];?>"><?php echo $d['title'];?></a></h1>
	<p><?php echo date('d.m.Y',strtotime($d['date']));?></p>
	<img src="<?php echo $d['image'];?>" />
	<p><?php echo $d['excerpt'];?></p>
<?php endforeach; ?>

<hr/>