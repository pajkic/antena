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