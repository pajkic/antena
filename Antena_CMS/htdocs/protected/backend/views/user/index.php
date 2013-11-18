<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Korisnici'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj korisnika'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj korisnicima'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Korisnici');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>