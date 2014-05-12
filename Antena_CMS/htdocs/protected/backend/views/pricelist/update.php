<?php
/* @var $this PricelistController */
/* @var $model Pricelist */
?>

<?php
$this->breadcrumbs=array(
	'Cenovnici'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Cenovnika', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Cenovnik', 'url'=>array('create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Cenovnik', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Cenovnicima', 'url'=>array('admin')),
);
?>

    <h1>Izmeni cenovnik <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>