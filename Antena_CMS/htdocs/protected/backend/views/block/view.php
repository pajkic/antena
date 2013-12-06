<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blokovi'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista blokova'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj blok'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni blok'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši blok'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj blokovima'), 'url'=>array('admin')),
);
?>

<h1>Pregledaj blok <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		'name',
		//'block_type_id',
		//'block_position_id',
	
		//'options',
		//'created',
		//'updated',
		//'user_id',
	),
)); ?>