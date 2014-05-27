<?php
/* @var $this CityController */
/* @var $model City */
?>

<?php
$this->breadcrumbs=array(
	'Lokacije'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	//array('label'=>Yii::t('app','Lista ') . 'Lokacija', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Lokaciju', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Lokaciju', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Lokacijama', 'url'=>array('admin')),
	array('label'=>Yii::t('app','Prevedi ') . 'Lokaciju', 'url'=>array('LocationDescription/update', 'id'=>$model->id)),
	);
?>

    <h1>Izmeni lokaciju <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>