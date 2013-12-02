<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Navigacija'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stavki'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj stavku'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni stavku'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Prevedi stavku'), 'url'=>array('MenuDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši stavku'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj menijem'), 'url'=>array('admin')),
);
?>

<h1>Pogledaj stavku <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		'name',
		'order',
		'parent_id',
		'level',
		'type',
		'content',
	),
)); ?>