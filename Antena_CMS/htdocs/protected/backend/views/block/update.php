<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Block', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Block', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Block', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Block', 'url'=>array('admin')),
);
?>

    <h1>Update Block <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>