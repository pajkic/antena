<?php
/* @var $this GalleryDescriptionController */
/* @var $model GalleryDescription */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Descriptions'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryDescription', 'url'=>array('admin')),
);
?>

<h1>Create GalleryDescription</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>