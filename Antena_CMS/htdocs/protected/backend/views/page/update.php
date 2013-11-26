<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Post', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Post', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Post', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Post', 'url'=>array('admin')),
);
?>

    <h1>Update Post <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>