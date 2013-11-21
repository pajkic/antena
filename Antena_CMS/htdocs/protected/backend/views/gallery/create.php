<?php
/* @var $this GalleryController */
/* @var $model Gallery */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Galerije')=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista galerija'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj galerijama'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Kreiraj galeriju');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>