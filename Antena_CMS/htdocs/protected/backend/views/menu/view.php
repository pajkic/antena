<?php
/* @var $this MenuController */
/* @var $model Menu */
?>

<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Menu','url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Menu','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Menu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Menu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Menu', 'url'=>array('admin')),
);
?>

<h1>View Menu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'lang_id',
		'name',
		'decription',
		'guid',
		'order',
	),
)); ?>