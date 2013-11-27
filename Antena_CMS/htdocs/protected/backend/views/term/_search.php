<?php
/* @var $this TermController */
/* @var $model Term */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>20)); ?>
                    <?php echo $form->textFieldControlGroup($model,'order',array('span'=>5,'maxlength'=>45)); ?>
                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>200)); ?>
                    <?php echo $form->textFieldControlGroup($model,'parent_id',array('span'=>5,'maxlength'=>20)); ?>
                    <?php echo $form->textAreaControlGroup($model,'description_url',array('rows'=>6,'span'=>8)); ?>
                    <?php echo $form->textFieldControlGroup($model,'group',array('span'=>5,'maxlength'=>10)); ?>

        <?php echo TbHtml::submitButton('Traži',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->