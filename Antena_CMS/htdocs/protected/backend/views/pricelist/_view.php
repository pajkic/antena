<?php
/* @var $this PricelistController */
/* @var $data Pricelist */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo Chtml::link(CHtml::encode($data->name),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode(date('d.m.Y',strtotime($data->start_date))); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo ($data->active == 1) ? Yii::t('app','Da') : Yii::t('app','Ne'); ?>
	<br />
	
	<?php echo Chtml::link(Yii::t('app','Cene'),array('PricelistVehicles','id'=>$data->id)); ?>
	<br/>



</div>