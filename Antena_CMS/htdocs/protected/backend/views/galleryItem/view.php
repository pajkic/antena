<?php
/* @var $this GalleryItemController */
/* @var $model GalleryItem */
?>

<?php
$this->breadcrumbs=array(
	'Gallery Items'=>array('index'),
	$model->name,
);


$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItem','url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItem','url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni ') . 'GalleryItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši ') . 'GalleryItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj ') . 'GalleryItem', 'url'=>array('admin')),
);
?>

<h1>View GalleryItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'gallery_id',
		'name',
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$description,
    'attributes'=>array(
		'title',
		'description',
	),
)); ?>
<?php echo TbHtml::imageRounded($image);?>

<?php var_dump($description);?>