<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Block','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Block','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Block', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Block', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Block', 'url'=>array('admin')),
);
?>

<h1>View Block #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'block_type_id',
		'block_position_id',
		'status_id',
		'options',
		'created',
		'updated',
		'user_id',
	),
)); ?>