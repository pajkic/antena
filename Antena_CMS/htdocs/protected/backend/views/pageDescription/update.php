<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
?>

<?php

$this->breadcrumbs=array(
	'Stranice'=>array('/Page/index'),
	$page->name=>array('Page/view','id'=>$page->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stranica'), 'url'=>array('/Page/index')),
	array('label'=>Yii::t('app','Kreiraj stranicu'), 'url'=>array('/Page/create')),
	array('label'=>Yii::t('app','Pregledaj stranicu'), 'url'=>array('Page/view', 'id'=>$page->id)),
	array('label'=>Yii::t('app','Upravljaj stranicama'), 'url'=>array('Page/admin')),
);
?>

    <h1>Uredi sadržaj stranice <?php echo $page->name;?></h1>

<?php

	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 

?>