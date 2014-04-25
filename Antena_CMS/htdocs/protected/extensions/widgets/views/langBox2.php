<div id="lang">
	<ul>
		<?php foreach ($languages as $lang): ?>
			<li
			<?php echo ($lang['lang']==Yii::app()->language) ? 'class="current"' : '';?>
			>
			<a href="<?php echo $currentUrl;?>lang/<?php echo $lang['lang'];?>"><img src="/images/backend/languages/<?php echo $lang['flag'];?>"/> <?php echo $lang['title'];?> </a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

