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
	array('label'=>Yii::t('app','Lista galerija'),'url'=>array('index')),
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
<input type="hidden" id="aaa" value="0"/>
    <?php
     
    	$this->widget('yiiwheels.widgets.fineuploader.WhFineUploader', array(
	    'name' => 'file_name',
	    'uploadAction' => $this->createUrl('galleryitem/upload', array('gallery_id' => $model->id)),
	    'pluginOptions' => array(
	    	'request' =>array(
				
			),
	    	'validation'=>array(
	    		'allowedExtensions' => array('jpeg', 'jpg')
	    		),
	    	
	    	),
	    'events'=>array(
	    
		'submit'=>"function(){
			var a=$('#aaa').val();
			a++;
			$('#aaa').val(a);
			
		}",
	    	'complete' => "function(data){
	    		var a=$('#aaa').val();
				a--;
				$('#aaa').val(a);
				if (a==0) {
					window.location.assign('/backend.php/gallery/".$model->id."')
				}
	    	}"
	   
        
    ),
    ));
	 
	 ?>
    
<?php 
	$items = GalleryItem::model()->findAllByAttributes(array('gallery_id' => $model->id));
	 
	$images = array();
	 foreach($items as $item){
		array_push($images, array(
		'image' => '/uploads/gallery/'.$model->id.'/thumbs/'.$item->name,
		//'caption' => TbHtml::linkButton('Obriši', array('submit'=>array('/galleryitem/delete','id'=>$item->id),'confirm'=>'Are you sure you want to delete this item?')) ,
		'url'=>'/backend.php/galleryitemdescription/update/'.$item->id,
		//array('label'=>'Uredi','url'=>'/backend.php/galleryitemdescription/update/'.$item->id),
		//array('label'=>'Obriši',array('url'=>'/backend.php/galleryitem', 'linkOptions'=>array('submit'=>array('delete','id'=>$item->id),'confirm'=>'Are you sure you want to delete this item?')))
		
		
		));
		
	} 
	echo TbHtml::thumbnails($images, array('span' => 2)); 
?>

