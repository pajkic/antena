<?php
/* @var $this GalleryController */
/* @var $model Gallery */
?>

<?php
$this->breadcrumbs=array(
	'Galerije'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista galerija'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj galeriju'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj galeriju'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj galerijama'), 'url'=>array('admin')),
);
?>

    <h1>Izmeni galeriju <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>