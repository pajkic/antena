<div class="customnav_block">
	<ul>
		<?php foreach ($data as $k=>$v):?>
		<li>
			<?php echo TbHtml::link($v, '/post/' . $k . '/' . urlencode($v) .'/lang/' . Yii::app()->language); ?>
		</li>

		<?php endforeach; ?>
	</ul>
</div>