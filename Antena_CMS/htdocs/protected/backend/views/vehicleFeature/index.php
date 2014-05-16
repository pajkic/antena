<?php
/* @var $this VehicleFeatureController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Karakteristike vozila',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Karakteristiku vozila','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Karakteristikama vozila','url'=>array('admin')),
);
?>

<h1>Karakteristike vozila</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>