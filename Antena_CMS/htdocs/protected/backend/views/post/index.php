<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Članci',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj članak'),'url'=>array('create')),
	array('label'=>Yii::t('app','Upravljaj člancima'),'url'=>array('admin')),
);
?>

<h1>Članci</h1>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */ ?>

<?php
$this->widget('CTreeView',
    array(
    'data' => $posts
	
	)
);
?>