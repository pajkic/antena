<?php
/* @var $this PostController */
/* @var $model Post */


$this->breadcrumbs=array(
	'Članci'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista članaka'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj članak'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#post-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj člancima');?></h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php /*echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); */?>
<div class="search-form" style="display:none">
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(1),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		//'user_id',
		
		array(
		'name'=>'user_id',
		'header'=>'Korisnik',
		'type'=>'raw',
		'value'=>'User::model()->findByPk($data->user_id)->display_name'
		),
		array(
		'name'=>'status_id',
		'header'=>'Status',
		'type'=>'raw',
		'filter' => CHtml::listData(PostStatus::model()->findAll(), 'id', 'name'),
		'value'=>'PostStatus::model()->findByPk($data->status_id)->name'),
		//'post_type_id',
		//'term_id',
		//'parent_id',
		/*
		'gallery_id',
		
		'image',
		'guid',
		'created',
		'modified',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>