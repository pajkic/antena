<?php
/* @var $this CurrencyController */
/* @var $model Currency */
?>

<?php
$this->breadcrumbs=array(
	'Valute'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Valuta', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Valutu', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Valutu', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

    <h1>Izmeni valutu <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>