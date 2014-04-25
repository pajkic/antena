<?php
/* @var $this GalleryItemDescriptionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Item Descriptions',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItemDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItemDescription','url'=>array('admin')),
);
?>

<h1>Gallery Item Descriptions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>