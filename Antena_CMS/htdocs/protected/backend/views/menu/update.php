<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Menu', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Menu', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Menu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Menu', 'url'=>array('admin')),
);
?>

    <h1>Update Menu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>