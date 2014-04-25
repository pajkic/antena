<?php
/* @var $this LanguageController */
/* @var $model Language */
?>

<?php
$this->breadcrumbs=array(
	'Jezici'=>array('index'),
	$model->name=>array('update','id'=>$model->id),
	Yii::t('app','Uredi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista jezika'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj jezik'), 'url'=>array('create')),
	//array('label'=>Yii::t('app','Pregledaj jezik'), 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Upravljaj ') . 'Language', 'url'=>array('admin')),
);
?>

    <h1>Uredi jezik <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>