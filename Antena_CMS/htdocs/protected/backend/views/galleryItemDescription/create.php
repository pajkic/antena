<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Item Descriptions'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItemDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItemDescription', 'url'=>array('admin')),
);
?>

<h1>Create GalleryItemDescription</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>