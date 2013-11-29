<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Članci'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista članaka'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj člancima'), 'url'=>array('admin')),
);
?>

<h1>Kreiraj članak</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'terms'=>$terms)); ?>