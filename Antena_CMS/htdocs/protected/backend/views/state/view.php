<?php
/* @var $this StateController */
/* @var $model State */
?>

<?php
$this->breadcrumbs=array(
	'Države'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista Država'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj Državu'),'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi Državu'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Prevedi Državu'), 'url'=>array('StateDescription/update', 'id'=>$model->id)),
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
       array(               
	        'label'=>Yii::t('app','Zastava'),
	        'type'=>'image',
	        'value'=>"../../images/backend/states/".$model->flagpath,
	        ),
  		'active',
		'main',
	),
)); ?>