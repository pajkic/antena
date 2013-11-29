<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	'Članci'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista članaka'),'url'=>array('index')),
	array('label'=>Yii::t('app','Kreiraj članak'),'url'=>array('create')),
	array('label'=>Yii::t('app','Uredi članak'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Sadržaj članka'), 'url'=>array('PostDescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši članak'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj člancima'), 'url'=>array('admin')),
);
?>


<h1>Pogledaj članak <?php echo $model->name; ?></h1>

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
		'id',
		'name',
		array(
		'label' => Yii::t('app','Korisnik'),
		'value' => $model->users->display_name
		),

		//'post_type_id',
		array(
		'label' => Yii::t('app','Kategorija'),
		'value' => implode(',',Yii::app()->db->createCommand('SELECT name FROM cms_term WHERE id IN(7,10)')->queryColumn())),

		//'parent_id',
		array(
		'label'=>Yii::t('app','Galerija'),
		'value'=>$gallery
		),

		array(
		'label'=>Yii::t('app','Status'),
		'value'=> $model->postStatuses->name
		),
		
		'image',
		'guid',
		'created',
		'modified',
	),
)); ?>

<h1>Sadržaj članka <?php echo $model->name; ?></h1>

<?php foreach ($model->postDescriptions as $description): ?>
<?php $post = '<h3>'.$description->title.'</h3>'.'<p><i>'.$description->excerpt.'</i></p>'.$description->content.''; ?>
<legend><?php echo Language::model()->findByPk($description->language_id)->name;?></legend>
<?php echo TbHtml::well($post, array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
<?php endforeach; ?>