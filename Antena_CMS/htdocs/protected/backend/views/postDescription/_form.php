<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
/* @var $form TbActiveForm */
?>
<?php $content_id = uniqid(); ?>
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'post-description-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->hiddenField($model,'id'); ?>
            
            <?php echo $form->hiddenField($model,'post_id'); ?>
            
            <?php echo $form->hiddenField($model,'language_id'); ?>

            
            <?php echo $form->textAreaControlGroup($model,'title',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'excerpt',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'content',array('id'=>$content_id)); ?>

		<?php if ((!$model->posts->users->id OR $model->posts->users->id == Yii::app()->user->id) OR $this->userData->level >= 20):?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    	</div>
    	
    	<?php endif; ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    CKEDITOR.replace( '<?php echo $content_id;?>',{
    	 language : '<?php echo Yii::app()->language;?>',
         filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
         filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
         filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
         filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
         filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
         filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash',
    });
</script>