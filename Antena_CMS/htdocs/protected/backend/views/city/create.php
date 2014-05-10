<?php
/* @var $this CityController */
/* @var $model City */
?>

<?php
$this->breadcrumbs=array(
	'Gradovi'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Gradova', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Gradovima', 'url'=>array('admin')),
);
?>

<h1>Kreiraj grad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>