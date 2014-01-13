<?php
/* @var $this PostController */
/* @var $model Post */

?>


<?php
$this->breadcrumbs=$breadcrumbs;
?>

<?php if (strlen($post['image']) > 0): ?>	

	<?php if (($post['post_type_id'] == 1) OR ($post['post_type_id']==2 AND Yii::app()->setting->getValue('page_image')=='yes')): ?>
	
		<img src="<?php echo $post['image'];?>" width="<?php echo Yii::app()->setting->getValue('post_image_width');?>";?>
		
	<?php endif; ?>

<?php endif; ?> 

<?php if (($post['post_type_id']==2 AND Yii::app()->setting->getValue('page_title')=='yes') OR ($post['post_type_id']==1)): ?>
	
	<h1><?php echo $content['title'];?></h1>

<?php endif; ?>

<?php if ($post['post_type_id']==1): ?>
	
	<small><?php echo date('d. m. Y.', strtotime($post['created']));?></small>

<?php endif; ?>

<?php  if (strlen($content['excerpt']) > 0): ?>

<?php endif; ?> 

<?php echo $content['content']; ?>

<?php 
$this->widget('application.extensions.widgets.bGallery',array(
	'data' => $gallery,
	'block' => array(),
)); 
?>




	
