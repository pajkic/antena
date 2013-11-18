<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Korisnici',
);

$this->menu=array(
	array('label'=>'Kreiraj korisnika','url'=>array('create')),
	array('label'=>'Upravljaj korisnicima','url'=>array('admin')),
);
?>

<h1>Korisnici</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>