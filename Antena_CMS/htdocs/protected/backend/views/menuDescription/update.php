<?php
/* @var $this MenuDescriptionController */
/* @var $model MenuDescription */
?>

<?php
$this->breadcrumbs=array(
	'Navigacija'=>array('/Menu/index'),
	$menu->name=>array('/Menu/view','id'=>$menu->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stavki'), 'url'=>array('/Menu/index')),
	array('label'=>Yii::t('app','Kreiraj stavku'), 'url'=>array('/Menu/create')),
	array('label'=>Yii::t('app','Pregledaj stavku'), 'url'=>array('/Menu/view', 'id'=>$menu->id)),
	array('label'=>Yii::t('app','Upravljaj menijem'), 'url'=>array('/Menu/admin')),
);
?>

    <h1>Prevedi stavku <?php echo $menu->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 


 ?>