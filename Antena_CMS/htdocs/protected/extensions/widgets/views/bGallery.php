<div class="gallery_block">

<?php if ($block['heading'] == 1): ?>
<h3><?php echo $block_title;?></h3>
<?php endif; ?>
	
<?php
$this->beginWidget('application.extensions.prettyPhoto.PrettyPhoto', array(
  'id'=>rand(0,9999),
  // prettyPhoto options
  'options'=>array(
    'opacity'=>0.80,
    'modal'=>false,
    'show_title'=>false,
    
  ),
  'gallery'=>false,
  'theme'=>'facebook'
));
 
foreach ($data as $image) {
?>
<a href="<?php echo $image['image']; ?>" rel="prettyPhoto[<?php echo $gid; ?>]">	
<img src="<?php echo $image['thumb']; ?>" width="<?php echo $w; ?>" height="<?php echo $h;?>"  alt="<?php  echo $image['description']; ?>" />
</a>
	<?php
	}

	$this->endWidget('application.extensions.prettyPhoto.PrettyPhoto');
	?>
</div>

