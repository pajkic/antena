<?php
/* @var $this MenuDescriptionController */
/* @var $model MenuDescription */
?>

<?php
$this->breadcrumbs=array(
	'Blokovi'=>array('/Block/index'),
	$block->name=>array('/Block/view','id'=>$block->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista blokova'), 'url'=>array('/Block/index')),
	array('label'=>Yii::t('app','Kreiraj blok'), 'url'=>array('/Block/create')),
	array('label'=>Yii::t('app','Pregledaj blok'), 'url'=>array('/Block/view', 'id'=>$block->id)),
	array('label'=>Yii::t('app','Upravljaj blokovima'), 'url'=>array('/Block/admin')),
);
?>

    <h1>Prevedi naslov bloka <?php echo $block->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 


 ?>