<div class="accordion_block">
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>$data,
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
        
    ),
    'themeUrl'=>'/css',
    'theme'=>'accordion',
    'cssFile' => 'custom.css',
	
));
?>
</div>
