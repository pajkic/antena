<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
)); ?>
	<p class="help-block"><?php echo Yii::t('en','Fields with <span class="required">*</span> are required.');?></p>
	    
    <?php echo $form->textFieldControlGroup($model, 'username', array('id' => 'username', 'placeholder' => 'Username', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('id' => 'password','placeholder' => 'Password', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
	    
    <div class="form-actions">
        <?php echo TbHtml::submitButton('Login',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		    'value'=>'Login',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form1 -->
