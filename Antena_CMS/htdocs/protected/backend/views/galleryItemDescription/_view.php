<?php
/* @var $this GalleryItemDescriptionController */
/* @var $data GalleryItemDescription */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language_id')); ?>:</b>
	<?php echo CHtml::encode($data->language_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>