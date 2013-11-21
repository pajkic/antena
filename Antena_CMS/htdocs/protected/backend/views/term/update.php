<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Term', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Term', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Term', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Term', 'url'=>array('admin')),
);
?>

    <h1>Update Term <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>