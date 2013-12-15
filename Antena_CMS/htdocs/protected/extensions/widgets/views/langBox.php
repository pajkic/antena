<div>
<?php foreach ($data as $k=>$v):?>
<div>
<?php echo TbHtml::link($v,'?_lang='.$k);?>
</div>
<?php endforeach; ?>
</div>