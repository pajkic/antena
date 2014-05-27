<?php
/* @var $this CityController */
/* @var $model City */
?>

<?php
$this->breadcrumbs=array(
	'Gradovi'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>Yii::t('app','Lista ') . 'Gradova','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj Grad'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni Grad'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj Gradovima'), 'url'=>array('admin')),
	array('label'=>Yii::t('app','Prevedi Grad'), 'url'=>array('CityDescription/update', 'id'=>$model->id)),
);
?>

<h1>Pogledaj grad <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		array(
		'label' => Yii::t('app','Država'),
		'value' => $model->states->name
		),

		
		'active',
		
	),
)); ?>