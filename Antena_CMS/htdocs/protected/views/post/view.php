<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<?php if ($post['post_type_id']==1): ?>
	
<img src="<?php echo $post['image'];?>" width="400" height="200"/>  
<h1><?php echo $content['title'];?></h1>
<p><?php echo date('d.m.Y', strtotime($post['created']));?></p>
<p><?php echo $content['excerpt'];?></p>

<?php endif; ?>

<p><?php echo $content['content'];?></p>

<?php
$this->widget('application.extensions.widgets.bGallery',array(
	'data' => $gallery
));
?>




	
