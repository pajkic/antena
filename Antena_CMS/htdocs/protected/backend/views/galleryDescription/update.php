<?php
/* @var $this GalleryDescriptionController */
/* @var $model GalleryDescription */
?>

<?php

$this->breadcrumbs=array(
	'Galerije'=>array('/Gallery/index'),
	$gallery->name=>array('Gallery/view','id'=>$gallery->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista galerija'), 'url'=>array('/Gallery/index')),
	array('label'=>Yii::t('app','Kreiraj galeriju'), 'url'=>array('/Gallery/create')),
	array('label'=>Yii::t('app','Pregledaj galeriju'), 'url'=>array('Gallery/view', 'id'=>$gallery->id)),
	array('label'=>Yii::t('app','Upravljaj galerijama'), 'url'=>array('Gallery/admin')),
);
?>

    <h1>Uredi galeriju <?php echo $gallery->name;?></h1>

<?php



	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 

?>