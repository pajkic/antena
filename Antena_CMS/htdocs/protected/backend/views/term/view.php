<?php
/* @var $this TermController */
/* @var $model Term */
?>

<?php
$this->breadcrumbs=array(
	'Kategorije'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista kategorija'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj kategoriju'),'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi kategoriju'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Prevedi kategoriju'), 'url'=>array('TermDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši kategoriju'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj kategorijama'), 'url'=>array('admin')),
);
?>

<h1>Pogledaj kategoriju <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'order',
		'name',
		'parent_id',
		//'description_url',
		//'group',
	),
)); ?>

