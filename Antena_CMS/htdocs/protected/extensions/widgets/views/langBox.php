<?php echo CHtml::form(); ?>
    <div id="lang">
    	
        <?php echo CHtml::dropDownList('_lang', $currentLang, array('sr' => 'Srpski', 'hr' => 'Hrvatski', 'en' => 'English'), array('submit' => '')); ?>
		
    </div>
<?php echo CHtml::endForm(); ?>
