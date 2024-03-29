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
	array('label'=>Yii::t('app','Uredi stranicu'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Sadržaj stranice'), 'url'=>array('PageDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši stranicu'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj stranicama'), 'url'=>array('admin')),
);
?>

<h1>Pogledaj stranicu <?php echo $model->name; ?></h1>

<?php if(!$model->posts) {
		$parent=Yii::t('app','Bez nadređene stranice.');
	} else {
		$parent = $model->posts->name;
	}
?>

<?php if(!$model->galleries) {
		$gallery=Yii::t('app','Bez Galerije.');
	} else {
		$gallery = $model->galleries->name;
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
		'value' => $model->users->display_name),
		//'post_type_id',
		//'term_id',
		array(
		'label' => Yii::t('app','Nadređena stranica'),
		'value' => $parent
		),
		array(
		'label'=>Yii::t('app','Galerija'),
		'value'=>$gallery
		),
		'image',
		'guid',
		array(
		'label'=>Yii::t('app','Kreiran'),
		'value'=>date('d.m.Y',strtotime($model->created))
		),
		array(
		'label'=>Yii::t('app','Izmenjen'),
		'value'=>date('d.m.Y',strtotime($model->modified))
		),
		array(
		'label'=>Yii::t('app','Status'),
		'value'=> $model->postStatuses->name
		),
		
	),
)); ?>
<h1>Sadržaj stranice <?php echo $model->name; ?></h1>

<?php foreach ($model->postDescriptions as $description): ?>
<?php $page = '<h3>'.$description->title.'</h3>'.'<p><i>'.$description->excerpt.'</i></p>'.$description->content.''; ?>
<legend><?php echo Language::model()->findByPk($description->language_id)->name;?></legend>
<?php echo TbHtml::well($page, array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
<?php endforeach; ?>
