<?php foreach ($data as $k=>$v):?>
<div id="lang"> 
<label>
    <select>
        <option selected><?php echo TbHtml::link($v,'?_lang='.$k);?></option>
        <option>Srpski</option>
        <option>Hrvatski</option>
    </select>
</label>
</div>

 
<?php endforeach; ?>
 