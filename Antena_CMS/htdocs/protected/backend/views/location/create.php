<?php
/* @var $this LocationController */
/* @var $model Location */
?>

<?php
$this->breadcrumbs=array(
	'Lokacije'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Lokacija', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Lokacijama', 'url'=>array('admin')),
);
?>

<h1>Kreiraj lokaciju</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>