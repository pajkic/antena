<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Meniji',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj meni'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj menijima'),'url'=>array('admin')),
);
?>

<h1>Meniji</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>