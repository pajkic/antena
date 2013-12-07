<?php
/* @var $this PostDescriptionController */
/* @var $model PostDescription */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'post_id',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'language_id',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'title',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'excerpt',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'content',array('rows'=>6,'span'=>8)); ?>

        <?php echo TbHtml::submitButton('Traži',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->