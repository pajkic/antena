<?php
/* @var $this TermDescriptionController */
/* @var $model TermDescription */
?>

<?php
$this->breadcrumbs=array(
	'Kategorije'=>array('/Term/index'),
	$term->name=>array('Term/view','id'=>$term->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista kategorija'), 'url'=>array('/Term/index')),
	array('label'=>Yii::t('app','Kreiraj kategoriju'), 'url'=>array('/Term/create')),
	array('label'=>Yii::t('app','Pregledaj kategoriju'), 'url'=>array('Term/view', 'id'=>$term->id)),
	array('label'=>Yii::t('app','Upravljaj kategorijama'), 'url'=>array('Term/admin')),
);
?>

    <h1>Prevedi kategoriju <?php echo $term->name; ?></h1>

<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 


 ?>