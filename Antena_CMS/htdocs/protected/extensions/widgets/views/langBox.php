<label>
    <select>
        <option selected> Select Box </option>
        <option>Short Option</option>
        <option>This Is A Longer Option</option>
    </select>
</label>

<div>
<?php foreach ($data as $k=>$v):?>
<div>
<?php echo TbHtml::link($v,'?_lang='.$k);?>
</div>
<?php endforeach; ?>
</div>