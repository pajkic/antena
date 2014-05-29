<?php
/* @var $this LocationController */
/* @var $model Location */
?>

<?php
$this->breadcrumbs=array(
	'Lokacije'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Lokacija','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj Lokaciju'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni Lokaciju'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj Lokacijama'), 'url'=>array('admin')),
	array('label'=>Yii::t('app','Prevedi Lokaciju'), 'url'=>array('LocationDescription/update', 'id'=>$model->id)),
);
?>

<h1>Pogledaj lokaciju <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		array(
		'label' => Yii::t('app','Grad'),
		'value' => $model->cities->name
		),

		
		'active',
		
	),
)); ?>