<?php
/* @var $this GalleryDescriptionController */
/* @var $model GalleryDescription */
?>

<?php
/*
$this->breadcrumbs=array(
	'Gallery Descriptions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryDescription', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'GalleryDescription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryDescription', 'url'=>array('admin')),
);
 * 
 */
?>

    <h1>Update GalleryDescription</h1>

<?php



	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 

?>