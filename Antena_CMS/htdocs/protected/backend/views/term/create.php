<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Term', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Term', 'url'=>array('admin')),
);
?>

<h1>Create Term</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>