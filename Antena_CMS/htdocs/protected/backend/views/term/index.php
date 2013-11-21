<?php
/* @var $this TermController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Terms',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Term','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Term','url'=>array('admin')),
);
?>

<h1>Terms</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>