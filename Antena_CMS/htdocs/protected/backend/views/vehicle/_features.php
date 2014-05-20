
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'vehicle-has-feature-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	)); 
	echo TbHtml::hiddenField('vehicle_id',$vehicle_id);
	echo TbHtml::hiddenField('language_id',$language_id);
    
	
	foreach($features as $feature) {
		
		echo TbHtml::checkBox('Feature['.$feature['vehicle_feature_id'].']', isset($vehicle_features[$feature['vehicle_feature_id']]) ? "checked" : "",	array('label' => $feature['title'])); 
		echo TbHtml::textField('Value[' . $feature['vehicle_feature_id'].']',isset($vehicle_features[$feature['vehicle_feature_id']]) ? $vehicle_features[$feature['vehicle_feature_id']] : $feature['values']);
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
