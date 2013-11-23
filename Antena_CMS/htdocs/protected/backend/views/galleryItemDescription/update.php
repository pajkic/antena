<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */
?>

<?php 


 $this->breadcrumbs=array(
 	Yii::t('app','Galerije') =>array('/gallery/index'),
 	$gallery->name => array('/gallery/view','id'=>$gallery->id),
	$item->name=>array('/galleryItemDescription/update','id'=>$item->id),
	Yii::t('app','Izmeni'),
);



$this->menu=array(
/*	array('label'=>Yii::t('app','Lista ') . 'GalleryItemDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItemDescription', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'GalleryItemDescription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItemDescription', 'url'=>array('admin')),*/
	array('label'=>Yii::t('app','Nazad na ') . $gallery->name,'Gallery', 'url'=>array('/gallery/view','id'=>$gallery->id)),
	 
);
?>

    <h1>Uredi sliku <?php //echo $model->id; ?></h1>


<?php

	echo TbHtml::imageRounded($image);
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs,
    'htmlOptions' => array('span'=>6)
    )); 

?>

