<?php
/* @var $this GalleryController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Galerije'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj galeriju'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj galerijama'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Galerije');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>