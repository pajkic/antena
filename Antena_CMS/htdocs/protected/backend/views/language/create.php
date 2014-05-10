<?php
/* @var $this LanguageController */
/* @var $model Language */
?>

<?php
$this->breadcrumbs=array(
	'Države'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista država'), 'url'=>array('index')),
	//array('label'=>Yii::t('app','Upravljaj jezicima'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Kreiraj državu');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>