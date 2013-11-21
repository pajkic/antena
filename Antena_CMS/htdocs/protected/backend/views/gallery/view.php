<?php
/* @var $this GalleryController */
/* @var $model Gallery */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','Galerije')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista galerija'),'url'=>array('create')),
	array('label'=>Yii::t('app','Kreiraj galeriju'),'url'=>array('create')),
	array('label'=>Yii::t('app','Izmeni galeriju'), 'url'=>array('gallerydescription/update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Obriši galeriju'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Upravljaj galerijama'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Pregledaj galeriju') . ' ' . $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'description',
	),
));  ?>

    <?php 
    	$this->widget('yiiwheels.widgets.fineuploader.WhFineUploader', array(
	    'name' => 'file_name',
	    'uploadAction' => $this->createUrl('galleryitem/upload', array('gallery_id' => $model->id)),
	    'pluginOptions' => array(
	    	'request' =>array(
				
			),
	    	'validation'=>array(
	    		'allowedExtensions' => array('jpeg', 'jpg')
	    		)
	    	)
    )); 
    ?>


<?php	$items = GalleryItem::model()->findAllByAttributes(array('gallery_id' => $model->id)); ?>
	
	
	<?php 
	$images = array();
	 foreach($items as $item){
		array_push($images, array(
		'image' => '/uploads/gallery/'.$model->id.'/thumb/'.$item->name,
		'label' => 'SDD',
		'url' => Yii::app()->getBaseUrl(true).'/backend.php/galleryitemdescription/update/'.$item->id,
		));
		
	} 
	echo TbHtml::thumbnails($images, array('span' => 2)); 
	?>
