<div class="tabs_block">
<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>$data,
    // additional javascript options for the accordion plugin
    'options'=>array(
     //   'animated'=>'bounceslide',
        
    ),
    'headerTemplate' => '<li><a href="{url}" title="{title}">{title}</a></li>',
    /*
    'themeUrl'=>'/css',
    'theme'=>'tabs',
    'cssFile' => 'custom.css',
	*/
));
?>
</div>
