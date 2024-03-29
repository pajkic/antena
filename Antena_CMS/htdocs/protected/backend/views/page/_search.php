<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>19)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5,'maxlength'=>19)); ?>

                    <?php echo $form->textFieldControlGroup($model,'post_type_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'term_id',array('span'=>5,'maxlength'=>19)); ?>

                    <?php echo $form->textFieldControlGroup($model,'parent_id',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gallery_id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status_id',array('span'=>5)); ?>
                    
                    <?php echo $form->textFieldControlGroup($model,'image',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'guid',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modified',array('span'=>5)); ?>

        <?php echo TbHtml::submitButton('Traži',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->