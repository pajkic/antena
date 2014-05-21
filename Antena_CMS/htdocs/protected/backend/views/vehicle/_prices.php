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
	echo TbHtml::hiddenField('vehicle_id',$vehicle_id);
	echo TbHtml::hiddenField('pricelist_id',$pricelist_id);
    
	
	foreach($pricedays as $priceday) {
		echo Tbhtml::label($priceday['name'],'');
		echo TbHtml::textField('Prices[' . $priceday['id'].']',isset($vehicle_prices[$priceday['id']]) ? $vehicle_prices[$priceday['id']] : 0);
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
