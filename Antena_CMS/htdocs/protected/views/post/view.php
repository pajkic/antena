<?php
/* @var $this PostController */
/* @var $model Post */
?>

<?php
$this->breadcrumbs=array(
	$post->name,
);
?>
<img src="<?php echo $post['image'];?>" width="400" height="200"/>
<h1><?php echo $content['title'];?></h1>
<?php echo $content['excerpt'];?>
<?php echo $content['content'];?>
