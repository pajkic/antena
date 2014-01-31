<?php
/* @var $this TermDescriptionController */
/* @var $model TermDescription */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'term-description-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

			<?php echo $form->hiddenField($model,'id',array('span'=>5)); ?>		
            <?php echo $form->hiddenField($model,'term_id',array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'language_id',array('span'=>5)); ?>
            <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textAreaControlGroup($model,'excerpt',array('rows'=>6,'span'=>8)); ?>
            <?php echo $form->textAreaControlGroup($model,'keywords',array('rows'=>2,'span'=>8)); ?>
            

        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Snimi' : 'Snimi',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->