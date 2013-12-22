<?php
/* @var $this UserController */
/* @var $data User */
?>

<div>
	<h2><?php echo TbHtml::link(CHtml::encode($data->postDescription->title),'/post/'.$data->id.'/'.urlencode($data->postDescription->title).'/lang/'.Yii::app()->language); ?></h2>
	<p><?php echo date('d.m.Y',strtotime($data->created));?></p>
	<img src="<?php echo $data->image;?>" width="80" height="60"/>
	<p><?php echo CHtml::encode($data->postDescription->excerpt); ?></p>
	<br />
</div>