<?php
/* @var $this VehicleController */
/* @var $data Vehicle */
?>

<div class="view">
	<span class="right">
	<?php echo CHtml::image("../../".$data->image,"",$htmlOptions=array("width"=>220, "height"=>157)); ?>
	</span>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />
	
	<?php echo Chtml::link(Yii::t('app','Cene'),array('view','id'=>$data->id)); ?>
	<br/>

	<?php echo Chtml::link(Yii::t('app','Karakteristike'),array('VehicleFeatures','id'=>$data->id)); ?>
	<br/>

</div>
<div style="clear:both"></div>
