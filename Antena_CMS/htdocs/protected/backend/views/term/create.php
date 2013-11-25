<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Kategorije'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista kategorija'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj kategorijama'), 'url'=>array('admin')),
);
?>

<h1>Create Term</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>