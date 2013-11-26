<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Post', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Post', 'url'=>array('admin')),
);
?>

<h1>Create Post</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>