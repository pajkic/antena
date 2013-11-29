<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
?>

<?php
$this->breadcrumbs=array(
	'Članci'=>array('index'),
	$post->name=>array('view','id'=>$post->id),
	Yii::t('app','Izmeni'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista članaka'), 'url'=>array('Post/index')),
	array('label'=>Yii::t('app','Kreiraj članak'), 'url'=>array('Post/create')),
	array('label'=>Yii::t('app','Pregledaj članak'), 'url'=>array('Post/view', 'id'=>$post->id)),
	array('label'=>Yii::t('app','Upravljaj člancima'), 'url'=>array('Post/admin')),
);
?>

    <h1>Uredi sadržaj članka <?php echo $post->name; ?></h1>

<?php

	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 

?>