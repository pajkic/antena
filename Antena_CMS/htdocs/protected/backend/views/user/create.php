<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Korisnici')=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Pregledaj korisnike'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj korisnicima'), 'url'=>array('admin')),
);
?>

<h1>Kreiraj korisnika</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>