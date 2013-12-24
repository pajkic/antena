<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blokovi'=>array('index'),
	$model->name ." "=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista blokova'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj blok'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj blok'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Prevedi naziv bloka'), 'url'=>array('BlockDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj blokovima'), 'url'=>array('admin')),
);
?>

    <h1>Uredi blok <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'bterms'=>$bterms, 'bpages'=>$bpages)); ?>