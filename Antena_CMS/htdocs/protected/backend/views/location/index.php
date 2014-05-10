<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Lokacije',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Lokaciju','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Lokacijama','url'=>array('admin')),
);
?>

<h1>Lokacije</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>