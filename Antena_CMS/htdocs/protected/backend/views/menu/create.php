<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Navigacija'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stavki'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj menijem'), 'url'=>array('admin')),
);
?>

<h1>Kreiraj stavku menija</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>