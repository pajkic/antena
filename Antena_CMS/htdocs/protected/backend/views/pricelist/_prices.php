<h4>Cena u bodovima po danu:</h4>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'vehicle-has-prices-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	)); 
	echo TbHtml::hiddenField('pricelist_id',$pricelist_id);
	echo TbHtml::hiddenField('pricedays_id',$pricedays_id);
    
	
	foreach($vehicles as $vehicle) {
		echo Tbhtml::label($vehicle['name'],'');
		echo TbHtml::textField('Prices[' . $vehicle['id'].']',isset($pricelist_vehicles[$vehicle['id']]) ? $pricelist_vehicles[$vehicle['id']] : 0);
	}
       ?>
        <div class="form-actions">
        <?php echo TbHtml::submitButton('Sačuvaj',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
