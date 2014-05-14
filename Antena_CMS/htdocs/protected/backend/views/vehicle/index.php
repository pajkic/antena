<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Vozila',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Vozilo','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Vozilima','url'=>array('admin')),
);
?>

<h1>Vozila</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>