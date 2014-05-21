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
	
	'dataProvider'=>$dataProvider,
	'template' => "{items}\n{pager}",
	'columns'=>array(
	    array(
	    'name' => 'id',
	    'header' => '#',
	    'htmlOptions' => array('color' =>'width: 60px'),
	    ),
	    array(
	    'name' => 'name',
	    'header' => 'Naziv',
	    'type' => 'raw',
	    'value'=>'CHtml::link($data["name"],Yii::app()->createUrl("currency/update", array("id"=>$data["id"])))',
	    ),
	    array(
	    'name' => 'symbol',
	    'header' => 'Simbol',
	    ),
		array(
	    'name' => 'active',
	    'type' => 'raw',
	    'value'=>'CHtml::checkBox("active[]",$data->active,array("value"=>$data->id,"id"=>"active_".$data->id,"class"=>"currency_active"))',
	    'header' => 'Aktivna',
	    ),
	    array(
	    'name' => 'main',
	    'type' => 'raw',
	    'value'=>'CHtml::radioButton("main[]",$data->main,array("value"=>$data->id,"id"=>"main_".$data->id,"class"=>"currency_main"))',
	    'header' => 'Osnovna',
	    ),
	    array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
    <div id='AjFlash' class="flash-success" style="display:none"></div>
    
<script type="text/javascript">
	$('.currency_active').click(function(){
		var currency_id = this.id.substr(7);
		
		var active=this.checked;
		if (active) { a=1 } else { a=0 }
		
		
		$.ajax({
			'type': 'post',
			'url': '/backend.php/Currency/setActive/'+currency_id,
			'data': {"active" : a},
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
				
			}
		});
	});
	
	$('.currency_main').click(function(){
		
		var currency_id = this.id.substr(5);
				
		$.ajax({
			'type': 'post',
			'url': '/backend.php/Currency/setMain/'+currency_id,
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
			}
		});
	});
</script>