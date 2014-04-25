<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */


$this->breadcrumbs=array(
	'Post Descriptions'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'PostDescription', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'PostDescription', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#post-description-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> Post Descriptions</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'post-description-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'post_id',
		'language_id',
		'title',
		'excerpt',
		'content',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>