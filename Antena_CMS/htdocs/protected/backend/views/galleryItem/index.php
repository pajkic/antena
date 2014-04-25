<?php
/* @var $this GalleryItemController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Items',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItem','url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItem','url'=>array('admin')),
);
?>

<h1>Gallery Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>