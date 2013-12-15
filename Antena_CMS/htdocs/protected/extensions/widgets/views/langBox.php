 
<div id="lang"> 
<label>
    <select>
        <option selected>
        	<?php foreach ($data as $k=>$v):?>
        	<?php echo TbHtml::link($v,'?_lang='.$k);?>
        	<?php endforeach; ?>
        </option>
     
    </select>
</label>
</div>

 
 
 