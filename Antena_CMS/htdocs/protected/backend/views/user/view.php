<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php

$this->breadcrumbs=array(
	Yii::t('app','Korisnici')=>array('index'),
	$model->display_name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista korisnika'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj korisnika'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi korisnika'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši korisnika'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj korisnicima'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Pregled korisnika') . ' '.$model->display_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		
		array(
		'label' => Yii::t('app','Jezik'),
		'value' => $model->language->name),
		'login',
		'email',
		'display_name',
		'status',
		'created',
		'updated',
		'last_login',
		'avatar',
		array(
		'label' => Yii::t('app','Uloga'),
		'value' => $model->role->name
		),
	),
)); ?>