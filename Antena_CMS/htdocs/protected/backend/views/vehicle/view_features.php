<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
?>

<?php
$this->breadcrumbs=array(
	'Vozila'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Karakteristike',
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Vozila','url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Vozilo','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'Vozilo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'Vozilo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Da li zaista želite da obrišete ovu stavku?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Vozilima', 'url'=>array('admin')),
	array('label'=>Yii::t('app','Cene ') . 'Vozila', 'url'=>array('VehiclePrices', 'id'=>$model->id)),
);
?>

<h1>Karakteristike vozila <?php echo $model->name; ?></h1>
<p><?php echo CHtml::image(Yii::app()->getBaseUrl(true).$model->image,'',array('width'=>220,'height'=>157));?></p>
<?php
 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 


 
?>