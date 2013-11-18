<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Korisnici')=>array('index'),
	$model->display_name=>array('view','id'=>$model->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista korisnika'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj korisnika'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj korisnika'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj korisnicima'), 'url'=>array('admin')),
);
?>

    <h1><?php echo Yii::t('app','Uredi korisnika') .' ' .  $model->display_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>