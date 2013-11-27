<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Stranice'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista stranica'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj stranicu'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni stranicu'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši stranicu'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj straicama'), 'url'=>array('admin')),
);
?>

<h1>Pogledaj stranicu <?php echo $model->name; ?></h1>

<?php if(!$model->posts) {
		$parent='Bez nadređene stranice.';
	} else {
		$parent = $model->posts->name;
	}
?>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		'name',
		
		array(
		'label' => Yii::t('app','Korisnik'),
		'value' => $model->users->attributes['display_name']),
		//'post_type_id',
		//'term_id',
		array(
		'label' => Yii::t('app','Nadređena stranica'),
		'value' => $parent
		),
		'gallery_id',
		'status',
		'image',
		'guid',
		'created',
		'modified',
	),
)); ?>