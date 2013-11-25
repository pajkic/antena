<?php
/* @var $this BlockController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Blocks',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Block','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Block','url'=>array('admin')),
);
?>

<h1>Blocks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>