<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'city-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>
			<?php echo $form->dropDownListControlGroup($model,'state_id',CHtml::listData(State::model()->findAllByAttributes(array('active'=>1)), 'id', 'name'),array('span'=>5)); ?>
            <?php echo $form->dropDownListControlGroup($model,'active',array('0'=>'Nije aktivan','1'=>'Aktivan'),array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'main',array('span'=>5)); ?>

            

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->