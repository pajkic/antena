<?php
/* @var $this CurrencyController */
/* @var $model Currency */
?>

<?php
$this->breadcrumbs=array(
	'Valute'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Valuta', 'url'=>array('index')),
);
?>

<h1>Kreiraj valutu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>