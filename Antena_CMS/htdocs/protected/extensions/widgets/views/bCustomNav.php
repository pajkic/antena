<div class="customnav_block" id="block_<?php echo $block['id']?>">

<?php if ($block['heading'] == 1): ?>
<h3><?php echo $block_title;?></h3>
<?php endif; ?>

	<ul>
		<?php foreach ($data as $k=>$v):?>
		<?php $link = $k  . '/' . urlencode($v) . '/lang/' . Yii::app()->language;?>
		<li<?php echo ($link == Yii::app()->request->url) ? ' class="active"': ''; ?>>
			<?php echo TbHtml::link($v, $link); ?>
		</li>

		<?php endforeach; ?>
	</ul>
</div>