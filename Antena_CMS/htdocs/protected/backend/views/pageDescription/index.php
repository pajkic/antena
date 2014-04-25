<?php
/* @var $this PostDescriptionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Post Descriptions',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'PostDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'PostDescription','url'=>array('admin')),
);
?>

<h1>Post Descriptions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>