<?php
/* @var $this StateController */
/* @var $data State */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flagpath')); ?>:</b>
	<?php echo CHtml::encode($data->flagpath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo ($data->active == 1) ? Yii::t('app','Da') : Yii::t('app','Ne'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main')); ?>:</b>
	<?php echo ($data->main == 1) ? Yii::t('app','Da') : Yii::t('app','Ne'); ?>
	<br />


</div>