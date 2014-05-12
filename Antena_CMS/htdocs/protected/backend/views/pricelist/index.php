<?php
/* @var $this PricelistController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Cenovnici',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Cenovnik','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Cenovnicima','url'=>array('admin')),
);
?>

<h1>Cenovnici</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>