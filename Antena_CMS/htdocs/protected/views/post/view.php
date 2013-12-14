<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<img src="<?php echo $post['image'];?>" width="400" height="200"/>
 <p>
	<?php /*
	echo date('d.m.Y H:i:s', strtotime($post['created']));
	if ($post['modified']) {
		echo ' >> ' . date('d.m.Y H:i:s', strtotime($post['created']));
	}
	 * 
	 */?>
</p>
<h1><?php echo $content['title'];?></h1>
<?php echo $content['excerpt'];?>
<?php echo $content['content'];?>

<?php
$this->widget('application.extensions.widgets.bGallery',array(
	'data' => $gallery
));
?>




	
