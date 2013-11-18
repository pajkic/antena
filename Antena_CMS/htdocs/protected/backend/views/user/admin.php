<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	Yii::t('app','Korisnici')=>array('index'),
	Yii::t('app','Upravljaj'),
);

$this->menu=array(
	array('label'=>'Pregledaj korisnike', 'url'=>array('index')),
	array('label'=>'Kreiraj korisnika', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','Upravljaj korisnicima');?></h1>

<p>
   <?php echo Yii::t('app', 'Možete koristiti simbole za poređenje (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) na početku svake vrednosti za pretragu da biste definisali kako će se pretraga ponašati.');?>
</p>


<?php //echo CHtml::link('Napredna pretraga','#',array('class'=>'search-button btn')); ?>
<!-- <div class="search-form" style="display:none"> -->
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!-- </div> --><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'lang_id',
		'login',
		//'pass',
		'email',
		'display_name',
		/*
		'status',
		'activation_key',
		'created',
		'updated',
		'last_login',
		'avatar',
		'role_id',
		'level',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>