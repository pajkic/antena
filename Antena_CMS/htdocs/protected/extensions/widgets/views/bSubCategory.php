<div class="subcategory_block">

<?php if ($block['heading'] == 1): ?>
<h3><?php echo $block_title;?></h3>
<?php endif; ?>	
	
	<ul>
		<?php foreach ($data as $k=>$v):?>
		<li>
			<?php echo TbHtml::link($v, $k  . '/' . urlencode($v) . '/lang/' . Yii::app()->language); ?>
		</li>

		<?php endforeach; ?>
	</ul>
</div>