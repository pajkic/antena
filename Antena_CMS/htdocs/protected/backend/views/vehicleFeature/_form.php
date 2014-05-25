<?php
/* @var $this VehicleFeatureController */
/* @var $model VehicleFeature */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'vehicle-feature-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>
 
            <?php echo $form->textFieldControlGroup($model,'image', array('span'=>5,'maxlength'=>255,'id'=>'image', 'placeholder'=>'Kliknite da izaberete sliku')); ?>
            
            <?php echo Chtml::button('Ukloni sliku',array('id'=>'img_remove'));?>                        
            
            <?php if (strlen($model->image) > 0): ?>
            <img src="<?php echo $model->image; ?>" id="view_image" style="max-width:400px"/>
            <?php endif; ?> 
             
            <?php echo $form->textFieldControlGroup($model,'icon', array('span'=>5,'maxlength'=>255,'id'=>'icon', 'placeholder'=>'Kliknite da izaberete ikonicu')); ?>
           
            <?php echo Chtml::button('Ukloni ikonicu',array('id'=>'icon_remove'));?>                        
			
			<?php if (strlen($model->icon) > 0): ?>
			<img src="<?php echo $model->icon; ?>" id="view_icon" style="max-width:400px"/>
			<?php endif; ?>
			
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>

$('#img_remove').click(function(){
	$('#image').val('');
	$('#view_image').fadeTo(400,0.1);
});

$('#image').click(function(){

   		window.KCFinder = {};
    	window.KCFinder.callBack = function(url) {
    		$('#image').val(url);
        	window.KCFinder = null;
    	};
	    window.open('/kcfinder/browse.php?type=images',
	        'kcfinder_single', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
			);

});

$('#icon').click(function(){

   		window.KCFinder = {};
    	window.KCFinder.callBack = function(url) {
    		$('#icon').val(url);
        	window.KCFinder = null;
    	};
	    window.open('/kcfinder/browse.php?type=images',
	        'kcfinder_single', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
			);

});

$('#icon_remove').click(function(){
	$('#icon').val('');
	$('#view_icon').fadeTo(400,0.1);
})

</script> 