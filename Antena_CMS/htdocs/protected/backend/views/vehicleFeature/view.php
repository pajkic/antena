<?php
/* @var $this VehicleFeatureController */
/* @var $model VehicleFeature */
?>

<?php
$this->breadcrumbs=array(
	'Karakteristike vozila'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Karakteristika vozila','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Karakteristiku vozila','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Karakteristiku vozila','url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','Prevedi ') . 'Karakteristiku vozila', 'url'=>array('VehicleFeatureDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Karakteristikama vozila', 'url'=>array('admin')),
);
?>

<h1>Pogledaj Karakteristiku vozila <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
        array(               
	        'label'=>Yii::t('app','Slika'),
	        'type'=>'image',
	        'value'=>$model->image,
        ),    
        array(               
	        'label'=>Yii::t('app','Ikonica'),
	        'type'=>'image',
	        'value'=>$model->icon,
        ),      
		  
		
	),
)); ?>