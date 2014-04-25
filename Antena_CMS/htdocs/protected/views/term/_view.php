<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="listanje_clanci col-lg-5">
	<h3><?php echo TbHtml::link(CHtml::encode($data->postDescription->title),'/post/'.$data->id.'/'.urlencode($data->postDescription->title).'/lang/'.Yii::app()->language); ?></h3>
	<?php if ($data->post_type_id == 1): ?>
	<img class="img-responsive" src="<?php echo $data->image;?>" />
	<small><?php echo date('d. m. Y.',strtotime($data->created));?></small>
	<p><?php echo CHtml::encode($data->postDescription->excerpt); ?>	
		<div class="listanje_clanci_detaljnije"><?php echo TbHtml::link(CHtml::encode('detaljnije'),'/post/'.$data->id.'/'.urlencode($data->postDescription->title).'/lang/'.Yii::app()->language); ?></div>
	</p>	
	<?php endif; ?>
</div>