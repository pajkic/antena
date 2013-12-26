<div class="gallery_block">

<?php if ($block['heading'] == 1): ?>
<h3><?php echo $block_title;?></h3>
<?php endif; ?>
	
<?php
$this->beginWidget('application.extensions.prettyPhoto.PrettyPhoto', array(
  'id'=>'pretty_photo_widget',
  // prettyPhoto options
  'options'=>array(
    'opacity'=>0.80,
    'modal'=>false,
    
  ),
  'gallery'=>false,
  'theme'=>'dark_rounded'
));
 
foreach ($data as $image) {
?>
<a href="<?php echo $image['image']; ?>"  title="<?php echo $image['description']; ?>"  rel="prettyPhoto[<?php echo $gid; ?>]">	<img src="<?php echo $image['thumb']; ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="<?php //echo $image['title']; ?>"/> </a>
	<?php
	}

	$this->endWidget('application.extensions.prettyPhoto.PrettyPhoto');
	?>
</div>

