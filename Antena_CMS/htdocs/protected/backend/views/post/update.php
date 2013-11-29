<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Članci'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista članaka'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj članak'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj članak'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj člancima'), 'url'=>array('admin')),
);
?>

    <h1>Update Post <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'terms'=>$terms)); ?>