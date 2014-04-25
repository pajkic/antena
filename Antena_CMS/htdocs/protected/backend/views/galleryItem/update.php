<?php
/* @var $this GalleryItemController */
/* @var $model GalleryItem */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Items'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItem', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItem', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'GalleryItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItem', 'url'=>array('admin')),
);
?>

    <h1>Update GalleryItem <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>