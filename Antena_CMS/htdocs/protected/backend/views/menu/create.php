<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Menu', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Menu', 'url'=>array('admin')),
);
?>

<h1>Create Menu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>