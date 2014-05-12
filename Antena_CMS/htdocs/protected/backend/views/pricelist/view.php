<?php
/* @var $this PricelistController */
/* @var $model Pricelist */
?>

<?php
$this->breadcrumbs=array(
	'Cenovnici'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Cenovnika','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Cenovnik','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Cenovnik', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Cenovnik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Cenovnicima', 'url'=>array('admin')),
);
?>

<h1>Pogledaj cenovnik #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'start_date',
		'active',
	),
)); ?>