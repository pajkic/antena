<?php
/* @var $this CurrencyController */
/* @var $model Currency */
?>

<?php
$this->breadcrumbs=array(
	'Valute'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Valuta','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Valutu','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Valutu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Valutu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Da li zaista želite da obrišete ovu valutu?')),
	
);
?>

<h1>Pogledaj valutu <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'symbol',
		'rate',
		'active',
		'main',
	),
)); ?>