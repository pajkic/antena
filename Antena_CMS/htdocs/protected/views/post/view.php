<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<img src="<?php echo $post['image'];?>" width="400" height="200"/>
<h1><?php echo $content['title'];?></h1>
<?php echo $content['excerpt'];?>
<?php echo $content['content'];?>

<?php
$this->beginWidget('application.extensions.prettyPhoto.PrettyPhoto', array(
  'id'=>'pretty_photo',
  // prettyPhoto options
  'options'=>array(
    'opacity'=>0.80,
    'modal'=>true,
    
  ),
  
));

$w=80;
$h=60;
foreach ($gallery as $image) {
?>	<a href="<?php echo $image['image'];?>"  title="<?php echo $image['description'];?>"  rel="prettyPhoto[post_gallery]">
		<img src="<?php echo $image['thumb'];?>" width="<?php echo $w;?>" height="<?php echo $h;?>" alt="<?php //echo $image['title'];?>"/>
	</a>
<?php 
}

 
$this->endWidget('application.extensions.prettyPhoto.PrettyPhoto');

?>




	
