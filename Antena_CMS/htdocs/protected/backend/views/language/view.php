<?php
/* @var $this LanguageController */
/* @var $model Language */
?>


<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista jezika'),'url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj jezik'),'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi jezik'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Obriši ') . 'Language', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app','Upravljaj j') . 'Language', 'url'=>array('admin')),
);
?>

<h1>Pogledaj jezik <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'lang',
		'flagpath',
		'active',
		'main',
	),
)); ?>