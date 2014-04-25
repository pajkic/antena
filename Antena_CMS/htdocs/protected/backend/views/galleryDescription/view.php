<?php
/* @var $this GalleryDescriptionController */
/* @var $model GalleryDescription */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Descriptions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'GalleryDescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'GalleryDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryDescription', 'url'=>array('admin')),
);
?>

<h1>View GalleryDescription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'gallery_id',
		'language_id',
		'title',
		'description',
	),
)); ?>