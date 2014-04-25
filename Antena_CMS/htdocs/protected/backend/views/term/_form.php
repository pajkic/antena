<?php
/* @var $this TermController */
/* @var $model Term */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'term-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>200)); ?>
			
			<?php echo $form->dropDownListControlGroup($model,'parent_id', CHtml::listData(Term::model()->findAll(), 'id', 'name'),array('empty'=>'Bez nadređene kategorije')); ?>
			
			<?php echo $form->dropDownListControlGroup($model,'excerpt', array('1'=>'Prikaži uvod','0'=>'Sakrij uvod')); ?>

			<?php echo $form->textFieldControlGroup($model,'image', array('span'=>5,'maxlength'=>255,'id'=>'image', 'placeholder'=>'Kliknite da izaberete sliku')); ?>
            
            <?php echo Chtml::button('Ukloni sliku',array('id'=>'img_remove'));?>                        
			
			<?php echo $form->textFieldControlGroup($model,'sort',array('span'=>1,'maxlength'=>45)); ?>
            
            <?php //echo $form->textAreaControlGroup($model,'description_url',array('rows'=>6,'span'=>8)); ?>

            <?php //echo $form->textFieldControlGroup($model,'group',array('span'=>5,'maxlength'=>10)); ?>

        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Snimi' : 'Snimi',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>

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

$('#img_remove').click(function(){
	$('#image').val('');
})

</script>  