<?php
/* @var $this VehicleFeatureController */
/* @var $model VehicleFeature */
?>

<?php
$this->breadcrumbs=array(
	'Karakteristike vozila'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Karakteristika vozila', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Karakteristikama vozila', 'url'=>array('admin')),
);
?>

<h1>Kreiraj Karakteristiku vozila</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>