<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Navigacija',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj stavku'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj menijem'),'url'=>array('admin')),
);
?>

<h1>Stavke menija</h1>

<?php
$this->widget('CTreeView',
    array(
    'data' => $menus
	
	)
);
?>