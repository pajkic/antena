<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
?>

<?php
$this->breadcrumbs=array(
	'Post Descriptions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'PostDescription','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'PostDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'PostDescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'PostDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'PostDescription', 'url'=>array('admin')),
);
?>

<h1>View PostDescription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'post_id',
		'language_id',
		'title',
		'excerpt',
		'content',
	),
)); ?>