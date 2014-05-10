<?php
/* @var $this StateController */
/* @var $model State */
?>

<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista država'),'url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj državu'),'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi državu'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Obriši ') . 'Language', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app','Upravljaj j') . 'Language', 'url'=>array('admin')),
);
?>

<h1>Pogledaj državu <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'state',
		'flagpath',
		'active',
		'main',
	),
)); ?>