<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */
?>

<?php 
/*
 $this->breadcrumbs=array(
	'Gallery Item Descriptions'=>array('index'),
	$model->title=>array('view','id'=>$model_m->attributes->gallery_item_id),
	Yii::t('app','Izmeni'),
);
/*
$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItemDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItemDescription', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'GalleryItemDescription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItemDescription', 'url'=>array('admin')),
);
 * 
 */
?>

    <h1>Update GalleryItemDescription <?php //echo $model->id; ?></h1>

<?php

$tabs = array();
foreach ($model as $lm) {
	$language_id = $lm->attributes['language_id'];
	$language = Language::model()->findByPk($language_id);
	$content = $this->renderPartial('_form', array('model' => $lm), true);
	if ($language['main'] == 1) {
		$active = true;
	} else $active = false;
	$tabs[] = array(
		'label' => $language['name'],
		'content' => $content,
		'active' => $active
	);
}

	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 

?>