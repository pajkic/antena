<?php
/* @var $this GalleryItemController */
/* @var $model GalleryItem */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Items'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItem', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItem', 'url'=>array('admin')),
);
?>

<h1>Create GalleryItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>