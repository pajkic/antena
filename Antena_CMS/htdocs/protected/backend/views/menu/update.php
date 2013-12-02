<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Navigacija'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stavki'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj stavku'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Prevedi stavku'), 'url'=>array('MenuDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Pregledaj stavku'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj menijem'), 'url'=>array('admin')),
);
?>

    <h1>Izmeni stavku <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>