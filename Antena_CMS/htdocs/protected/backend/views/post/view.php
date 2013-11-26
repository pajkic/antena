<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Post','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Post','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'user_id',
		'post_type_id',
		'term_id',
		'parent_id',
		'gallery_id',
		'status',
		'guid',
		'created',
		'modified',
	),
)); ?>