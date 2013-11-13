<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4">
		<h1 class="text-center login-title">Login</h1>
		<div class="account-wall">
			<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
			<form class="form-signin">
				<input type="text" class="form-control" placeholder="Email" required autofocus>
				<input type="password" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>     
			</form>
		</div>      
	</div>
</div>
    


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
	<p class="help-block"><?php echo Yii::t('app','Polja označena <span class="required">*</span> su obavezna.');?></p>
	    
    <?php echo $form->textFieldControlGroup($model, 'username', array('id' => 'username', 'placeholder' => 'Korisničko ime', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('id' => 'password','placeholder' => 'Lozinka', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
	    
    <div class="form-actions">
        <?php echo TbHtml::submitButton('Login',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		    'value'=>'Login',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form1 -->

