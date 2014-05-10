<?php
/* @var $this CityController */
/* @var $model City */
?>

<?php
$this->breadcrumbs=array(
	'Gradovi'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Gradova', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Grad', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Grad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Gradovima', 'url'=>array('admin')),
);
?>

    <h1>Izmeni grad <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>