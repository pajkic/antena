<?php
/* @var $this TermController */
/* @var $model Term */


$this->breadcrumbs=array(
	'Kategorije'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista kategorija'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj kategoriju'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#term-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> kategorijama</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'term-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		
		'name',
		'parent_id',
		'order',
		//'description_url',
		//'group',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>