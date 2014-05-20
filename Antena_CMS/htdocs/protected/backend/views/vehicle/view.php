<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vozila'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Vozila','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Vozilo','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Vozilo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Vozilo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Da li zaista želite da obrišete ovu stavku?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Vozilima', 'url'=>array('admin')),
	array('label'=>Yii::t('app','Karakteristike ') . 'Vozila', 'url'=>array('VehicleFeatures', 'id'=>$model->id)),
);
?>

<h1>Pogledaj vozilo <?php echo $model->name; ?></h1>
<p><?php echo CHtml::image(Yii::app()->getBaseUrl(true).$model->image,'',array('width'=>220,'height'=>157));?></p>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
	),
)); 

?>