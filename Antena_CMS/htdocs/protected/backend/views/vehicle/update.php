<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vozilo'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Vozila', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Vozilo', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Vozila', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Vozilima', 'url'=>array('admin')),
	array('label'=>Yii::t('app','Cene ') . 'Vozila', 'url'=>array('VehiclePrices', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Karakteristike ') . 'Vozila', 'url'=>array('VehicleFeatures', 'id'=>$model->id)),
	
);
?>

    <h1>Izmeni vozilo <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>