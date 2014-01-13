<div class="tabs_block" id="block_<?php echo $block['id']?>">
<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>$data,
    // additional javascript options for the accordion plugin
    'options'=>array(
     //   'animated'=>'bounceslide',
        
    ),
    'headerTemplate' => '<li><a href="{url}">{title}</a></li>',
  
    'themeUrl'=>'/css',
    'theme'=>'tabs',
    'cssFile' => 'custom.css',
	
));
?>
</div>
