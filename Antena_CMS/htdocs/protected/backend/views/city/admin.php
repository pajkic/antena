<?php
/* @var $this CityController */
/* @var $model City */


$this->breadcrumbs=array(
	'Gradovi'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Gradova', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Grad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#city-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> Gradovima</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php //echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'city-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',		
		array(
		'name'=>'state_id',
		'header'=>'Država',
		'type'=>'raw',
		'filter' => CHtml::listData(State::model()->findAll(), 'id', 'name'),
		'value'=>'State::model()->findByPk($data->state_id)->name'
		),
		
		

		array(
	    'name' => 'active',
	    'type' => 'raw',
	    'value'=>'CHtml::checkBox("active[]",$data->active,array("value"=>$data->id,"id"=>"active_".$data->id,"class"=>"city_active"))',
	    'header' => 'Aktivan',
	    ),
		
	
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

    <div id='AjFlash' class="flash-success" style="display:none"></div>
    
<script type="text/javascript">
	$('.city_active').click(function(){
		var city_id = this.id.substr(7);
		
		var active=this.checked;
		if (active) { a=1 } else { a=0 }
		
		
		$.ajax({
			'type': 'post',
			'url': '/backend.php/City/setActive/'+city_id,
			'data': {"active" : a},
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
				
			}
		});
	});
	

</script>