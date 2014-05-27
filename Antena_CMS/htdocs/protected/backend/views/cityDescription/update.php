<?php
/* @var $this CityDescriptionController */
/* @var $model CityDescription */
?>

<?php
$this->breadcrumbs=array(
	'Gradovi'=>array('/City/index'),
	$city->name=>array('/City/view','id'=>$city->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Gradova', 'url'=>array('/City/index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Grad', 'url'=>array('/City/create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Grad', 'url'=>array('/City/view', 'id'=>$city->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Gradovima', 'url'=>array('/City/admin')),
);
?>

    <h1>Prevedi Grad <?php echo $city->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 
?>