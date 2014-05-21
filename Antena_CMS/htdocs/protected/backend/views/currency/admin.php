<?php
/* @var $this CurrencyController */
/* @var $model Currency */


$this->breadcrumbs=array(
	'Valute'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj ') . 'Valutu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#currency-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> Valutama</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php // echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
)); */ ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'currency-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'symbol',
		'rate',
		array(
	    'name' => 'active',
	    'type' => 'raw',
	    'value'=>'CHtml::checkBox("active[]",$data->active,array("value"=>$data->id,"id"=>"active_".$data->id,"class"=>"state_active"))',
	    'header' => 'Aktivan',
	    ),
	    array(
	    'name' => 'main',
	    'type' => 'raw',
	    'value'=>'CHtml::radioButton("main[]",$data->main,array("value"=>$data->id,"id"=>"main_".$data->id,"class"=>"state_main"))',
	    'header' => 'Osnovna',
	    ),		
	    array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>