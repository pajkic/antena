<?php
/* @var $this StateController */
/* @var $model State */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'state-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>20)); ?>
            <?php echo $form->textFieldControlGroup($model,'state',array('span'=>5,'maxlength'=>2)); ?>
            <?php echo $form->fileFieldControlGroup($model,'flagpath',array('span'=>5,'maxlength'=>45)); ?>
            <?php echo $form->dropDownListControlGroup($model,'active',array('0'=>'Nije aktivna','1'=>'Aktivna'),array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'main',array('span'=>5)); ?>

        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Snimi' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->