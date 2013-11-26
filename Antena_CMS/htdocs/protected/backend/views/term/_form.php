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
			<?php echo $form->textFieldControlGroup($model,'order',array('span'=>1,'maxlength'=>45)); ?>
            
            <?php //echo $form->textAreaControlGroup($model,'description_url',array('rows'=>6,'span'=>8)); ?>

            <?php //echo $form->textFieldControlGroup($model,'group',array('span'=>5,'maxlength'=>10)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->