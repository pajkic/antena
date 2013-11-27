<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
?>

<?php
$this->breadcrumbs=array(
	'Post Descriptions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'PostDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'PostDescription', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'PostDescription', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'PostDescription', 'url'=>array('admin')),
);
?>

    <h1>Update PostDescription <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>