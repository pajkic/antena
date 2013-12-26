<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="listanje_clanci">
	<h3><?php echo TbHtml::link(CHtml::encode($data->postDescription->title),'/post/'.$data->id.'/'.urlencode($data->postDescription->title).'/lang/'.Yii::app()->language); ?></h3>
	<small><?php echo date('d. m. Y.',strtotime($data->created));?></small>
	<img src="<?php echo $data->image;?>" width="80" height="60"/>
	<p><?php echo CHtml::encode($data->postDescription->excerpt); ?></p>
</div>