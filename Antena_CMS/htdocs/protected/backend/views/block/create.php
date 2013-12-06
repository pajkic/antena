<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blokovi'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista blokova'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj blokovima'), 'url'=>array('admin')),
);
?>

<h1>Create Block</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'terms' => $terms)); ?>