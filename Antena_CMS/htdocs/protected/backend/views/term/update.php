<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Kategorije'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista kategorija'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj kategoriju'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Prevedi kategoriju'), 'url'=>array('TermDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Pogledaj kategoriju'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj kategorijama'), 'url'=>array('admin')),
);
?>

    <h1>Uredi kategoriju <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>