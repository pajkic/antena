<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'lang_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'login',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->passwordFieldControlGroup($model,'pass',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'display_name',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'activation_key',array('span'=>5,'maxlength'=>60)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'last_login',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'avatar',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'role_id',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->