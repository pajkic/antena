<?php
/* @var $this VehicleFeatureController */
/* @var $data VehicleFeature */
?>

<div class="view">
	
	<?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->id)); ?>
	<?php echo CHtml::image($data->icon); ?>
	<br />

</div>