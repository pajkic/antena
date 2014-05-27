<?php
/* @var $this StateDescriptionController */
/* @var $model StateDescription */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'state-description-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

			<?php echo $form->hiddenField($model,'id',array('span'=>5)); ?>
	        <?php echo $form->hiddenField($model,'state_id',array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'language_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Kreiraj' : 'Snimi',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->