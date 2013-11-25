<?php
/* @var $this TermController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Kategorije',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj kategoriju'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj kategorijama'),'url'=>array('admin')),
);
?>

<h1>Kategorije</h1>

<?php
$this->widget('CTreeView',
    array(
    'url' => array('ajaxFillTree'),
	
	)
);
?>