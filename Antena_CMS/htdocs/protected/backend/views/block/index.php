<?php
/* @var $this BlockController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Blokovi',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj blok'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj blokovima'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Blokovi'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>