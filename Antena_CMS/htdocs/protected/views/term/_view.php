<?php
/* @var $this UserController */
/* @var $data User */
?>

<div>
	<h2><?php echo TbHtml::link(CHtml::encode($data->postDescription[0]->title),'/post/'.$data->id.'/'.urlencode($data->postDescription[0]->title)); ?></h2>
	<img src="<?php echo $data->image;?>" width="80" height="60"/>
	<p><?php echo CHtml::encode($data->postDescription[0]->excerpt); ?></p>
	<br />
</div>