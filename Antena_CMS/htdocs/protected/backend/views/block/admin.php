<?php
/* @var $this BlockController */
/* @var $model Block */


$this->breadcrumbs=array(
	'Blokovi'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista blokova'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj blok'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#block-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj blokovima');?></h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php //echo  CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
)); */ ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'block-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		array(
		'name'=>'block_type_id',
		'header'=>'Tip',
		'type'=>'raw',
		'filter' => CHtml::listData(BlockType::model()->findAll(), 'id', 'name'),
		'value'=>'BlockType::model()->findByPk($data->block_type_id)->name'),
		
		
		array(
		'name'=>'block_position_id',
		'header'=>'Pozicija',
		'type'=>'raw',
		'filter' => CHtml::listData(BlockPosition::model()->findAll(), 'id', 'name'),
		'value'=>'BlockPosition::model()->findByPk($data->block_position_id)->name'),

		array(
		'name'=>'status_id',
		'header'=>'Status',
		'type'=>'raw',
		'filter' => CHtml::listData(BlockStatus::model()->findAll(), 'id', 'name'),
		'value'=>'BlockStatus::model()->findByPk($data->status_id)->name'),
		
		//'options',
		/*
		'created',
		'updated',
		'user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>