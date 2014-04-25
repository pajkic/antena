<div class="custom_block" id="block_<?php echo $block['id']?>">

<?php if ($block['heading'] == 1): ?>
<div class="block_title"><?php echo $block_title;?></div>
<?php endif; ?>

<?php if ($page_title == 1): ?>
<?php echo '<h2>' .$data['title'] . '</h2>';?>
<?php endif; ?>


<?php echo $data['content']; ?>

</div>