<?php
/* @var $this VehicleFeatureDescriptionController */
/* @var $model VehicleFeatureDescription */
?>

<?php
$this->breadcrumbs=array(
	'Karakteristike vozila'=>array('/VehicleFeature/index'),
	$vehicle_feature->name=>array('/VehicleFeature/view','id'=>$vehicle_feature->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Karakteristika vozila', 'url'=>array('/VehicleFeature/index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Karakteristiku vozila', 'url'=>array('/VehicleFeature/create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Karakteristiku vozila', 'url'=>array('/VehicleFeature/view', 'id'=>$vehicle_feature->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Karakteristikama vozila', 'url'=>array('/VehicleFeature/admin')),
);
?>

    <h1>Prevedi Karakteristiku vozila <?php echo $vehicle_feature->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 
 ?>