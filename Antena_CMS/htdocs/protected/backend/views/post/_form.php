<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>

            <?php echo $form->hiddenField($model,'post_type_id',array('value'=>1)); ?>

            <?php echo $form->hiddenField($model,'parent_id',array('value'=>null)); ?>

			<?php echo $form->checkBoxListControlGroup($model, 'term_id', $terms); ?>
			
            <?php if ($this->userData->level >= 30): ?>
            <?php echo $form->dropDownListControlGroup($model,'gallery_id',CHtml::listData(Gallery::model()->findAll(), 'id', 'name'),array('empty'=>'Bez galerije')); ?>
			<?php else: ?>
			<?php echo $form->hiddenField($model,'gallery_id');?>
			<?php endif; ?>
			<?php echo $form->textFieldControlGroup($model,'image', array('span'=>5,'maxlength'=>255,'id'=>'image', 'placeholder'=>'Kliknite da izaberete sliku')); ?>
            
            <?php echo Chtml::button('Ukloni sliku',array('id'=>'img_remove'));?>                        
            
            <?php echo $form->textFieldControlGroup($model,'guid',array('span'=>5,'maxlength'=>255)); ?>
            
			<?php echo $form->dropDownListControlGroup($model,'status_id',CHtml::listData(PostStatus::model()->findAll(), 'id', 'name')); ?>            
			
            <?php //echo $form->hiddenField($model,'created',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'modified',array('span'=>5)); ?>
		
		<?php if ((!$model->user_id OR $model->user_id == Yii::app()->user->id) OR $this->userData->level >= 20):?>
			
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Snimi' : 'Snimi',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    	
    	<?php endif;?>

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
 