<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Korisnici'=>array('index'),
	'Kreiraj',
);

$this->menu=array(
	array('label'=>'Pregledaj korisnike', 'url'=>array('index')),
	array('label'=>'Upravljaj korisnicima', 'url'=>array('admin')),
);
?>

<h1>Kreiraj korisnika</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>