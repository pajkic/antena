<?php
/* @var $this LanguageController */
/* @var $model Language */
?>

<?php
$this->breadcrumbs=array(
	'Jezici'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista jezika'), 'url'=>array('index')),
	//array('label'=>Yii::t('app','Upravljaj jezicima'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Kreiraj jezik');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>