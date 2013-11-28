<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Stranice'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stranica'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj stranicu'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj stranicu'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Sadržaj stranice'), 'url'=>array('PageDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj stranicama'), 'url'=>array('admin')),
);
?>

    <h1>Uredi stranicu <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>