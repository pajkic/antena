<?php
/* @var $this GalleryDescriptionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Descriptions',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryDescription','url'=>array('admin')),
);
?>

<h1>Gallery Descriptions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>