<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
?>

<?php
$this->breadcrumbs=array(
	'Post Descriptions'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'PostDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'PostDescription', 'url'=>array('admin')),
);
?>

<h1>Create PostDescription</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>