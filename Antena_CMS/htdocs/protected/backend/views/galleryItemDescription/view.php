<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Item Descriptions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItemDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItemDescription','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'GalleryItemDescription', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'GalleryItemDescription', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItemDescription', 'url'=>array('admin')),
);
?>

<h1>View GalleryItemDescription #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'gallery_item_id',
		'language_id',
		'title',
		'description',
	),
)); ?>