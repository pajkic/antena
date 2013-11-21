<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */


$this->breadcrumbs=array(
	'Gallery Item Descriptions'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'GalleryItemDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'GalleryItemDescription', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gallery-item-description-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> Gallery Item Descriptions</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallery-item-description-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'gallery_item_id',
		'language_id',
		'title',
		'description',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>