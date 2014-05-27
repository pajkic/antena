<?php
/* @var $this LocationDescriptionController */
/* @var $model LocationDescription */
?>

<?php
$this->breadcrumbs=array(
	'Lokacije'=>array('/Location/index'),
	$location->name=>array('/Location/view','id'=>$location->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Lokacija', 'url'=>array('/Location/index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Lokaciju', 'url'=>array('/Location/create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Lokaciju', 'url'=>array('/Location/view', 'id'=>$location->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Lokacijama', 'url'=>array('/Location/admin')),
);
?>

    <h1>Prevedi Lokaciju <?php echo $location->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 
?>