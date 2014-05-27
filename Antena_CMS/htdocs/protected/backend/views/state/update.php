<?php
/* @var $this LanguageController */
/* @var $model Language */
?>

<?php
$this->breadcrumbs=array(
	'Države'=>array('index'),
	$model->name=>array('update','id'=>$model->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista država'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj državu'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Prevedi ') . 'Državu', 'url'=>array('StateDescription/update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Pregledaj jezik'), 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Upravljaj ') . 'Language', 'url'=>array('admin')),
);
?>

    <h1>Uredi državu <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>