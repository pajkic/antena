<?php
/* @var $this VehicleFeatureController */
/* @var $model VehicleFeature */
?>

<?php
$this->breadcrumbs=array(
	'Karakteristike vozila'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Karakteristika vozila', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Karakteristiku vozila', 'url'=>array('create')),
	array('label'=>Yii::t('app','Prevedi ') . 'Karakteristiku vozila', 'url'=>array('VehicleFeatureDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Pregledaj ') . 'Karakteristiku vozila', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Karakteristikama vozila', 'url'=>array('admin')),
);
?>

    <h1>Uredi Karakteristiku vozila <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>