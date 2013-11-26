<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Stranice'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stranica'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj stranicama'), 'url'=>array('admin')),
);
?>

<h1>Kreiraj stranicu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>