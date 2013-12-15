<label class="lang">
    <select>
        <option selected> English </option>
        <option>Srpski</option>
        <option>Hrvatski</option>
    </select>
</label>

<div>
<?php foreach ($data as $k=>$v):?>
<div>
<?php echo TbHtml::link($v,'?_lang='.$k);?>
</div>
<?php endforeach; ?>
</div>