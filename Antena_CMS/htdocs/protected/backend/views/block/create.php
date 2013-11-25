<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	Yii::t('app','Kreiraj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Block', 'url'=>array('index')),
	array('label'=>Yii::t('app','Upravljaj ') . 'Block', 'url'=>array('admin')),
);
?>

<h1>Create Block</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>