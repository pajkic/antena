<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Cenovnici'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Cene',
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

<h1>Cene po vremenskim rasponima po danu za <?php echo $model->name; ?></h1>

<?php
 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 


 
?>