<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.</p>');?>

    <?php echo $form->errorSummary($model); ?>

            <?$model->pass = '';?>
            
			<?php echo $form->dropDownListControlGroup($model,'lang_id', CHtml::listData(Language::model()->findAll(), 'id', 'name')); ?>
            
            <?php echo $form->textFieldControlGroup($model,'login',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->textFieldControlGroup($model,'pass',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->textFieldControlGroup($model,'display_name',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->dropDownListControlGroup($model,'status', array('1'=>'Aktivan', '0'=>'Neaktivan')); ?>

            <?php //echo $form->textFieldControlGroup($model,'activation_key',array('span'=>5,'maxlength'=>60)); ?>

            <?php //echo $form->textFieldControlGroup($model,'created',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'last_login',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'avatar',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->dropDownListControlGroup($model,'role_id', CHtml::listData(Role::model()->findAll('id>1'), 'id', 'name')); ?>

            <?php echo $form->hiddenField($model,'level',array('value'=>$model->level)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	$('#User_role_id').change(function(){
		var role = $('#User_role_id').val();
		switch(role){
			case '2':
				$('#User_level').val(30);
				break;
			case '3':
				$('#User_level').val(20);
				break;
			case '4':
				$('#User_level').val(10);
				break;
			case '5':
				$('#User_level').val(0);
				break;				
		}
	});
</script>