<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Stranice',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj stranicu'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj stranicama'),'url'=>array('admin')),
);
?>

<h1>Stranice</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>