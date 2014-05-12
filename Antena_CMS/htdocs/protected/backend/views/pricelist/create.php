<?php
/* @var $this PricelistController */
/* @var $model Pricelist */
?>

<?php
$this->breadcrumbs=array(
	'Cenovnici'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Cenovnika', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Cenovnicima', 'url'=>array('admin')),
);
?>

<h1>Kreiraj cenovnik</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>