<?php
/* @var $this CityController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Gradovi',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Grad','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Gradovima','url'=>array('admin')),
);
?>

<h1>Gradovi</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>