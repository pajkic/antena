<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vozila'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Vozila', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Vozilima', 'url'=>array('admin')),
);
?>

<h1>Kreiraj vozilo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>