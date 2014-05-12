<?php
/* @var $this PricelistController */
/* @var $model Pricelist */


$this->breadcrumbs=array(
	'Cenovnici'=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Cenovnika', 'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Cenovnik', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pricelist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj');?> Pricelists</h1>

<p><?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?></p>


<?php // echo CHtml::link(Yii::t('app','Napredna pretraga'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
)); */ ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pricelist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
		'name'=>'start_date',
		'header'=>'Datum',
		'type'=>'raw',
		'filter'=>'',
		'value'=>'date("d.m.Y",strtotime(Pricelist::model()->findByPk($data->id)->start_date))'
		),
	
		
		array(
	    'name' => 'active',
	    'type' => 'raw',
	    'filter'=>'',
	    'value'=>'CHtml::checkBox("active[]",$data->active,array("value"=>$data->id,"id"=>"active_".$data->id,"class"=>"pricelist_active"))',
	    'header' => 'Aktivan',
	    ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

    <div id='AjFlash' class="flash-success" style="display:none"></div>
    
<script type="text/javascript">
	$('.pricelist_active').click(function(){
		var pricelist_id = this.id.substr(7);
		
		var active=this.checked;
		if (active) { a=1 } else { a=0 }
		
		
		$.ajax({
			'type': 'post',
			'url': '/backend.php/Pricelist/setActive/'+pricelist_id,
			'data': {"active" : a},
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
				
			}
		});
	});
	

</script>