<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Term', 'url'=>array('index')),
	array('label'=>'Create Term', 'url'=>array('create')),
	array('label'=>'Update Term', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Term', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Term', 'url'=>array('admin')),
);
?>

<h1>View Term #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'description_url',
		'group',
	),
)); ?>