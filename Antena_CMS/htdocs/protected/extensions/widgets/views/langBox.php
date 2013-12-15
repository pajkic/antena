<?php foreach ($data as $k=>$v):?>
<div id="lang"> 
<label>
    <select>
        <option selected><?php echo TbHtml::link($v,'?_lang='.$k);?></option>
     
    </select>
</label>
</div>

 
<?php endforeach; ?>
 