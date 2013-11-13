<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>


<div class="account-wall">
	<img class="profile-img" src="/htdocs/protected/backend/extensions/bootstrap/assets/img/implementacija.png" alt="">
	<form class="form-signin">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'login-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>
	
		<?php echo $form->textFieldControlGroup($model, 'username', array('id' => 'username', 'placeholder' => 'Korisničko ime', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
    	<?php echo $form->passwordFieldControlGroup($model, 'password', array('id' => 'password','placeholder' => 'Lozinka', 'size' => TbHtml::INPUT_SIZE_MEDIUM)); ?>
    
		<input type="text" class="form-control" placeholder="Email" required autofocus>
		<input type="password" class="form-control" placeholder="Password" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>     
		
		 <?php echo TbHtml::submitButton('Login',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		    'value'=>'Login',
		)); ?>
		
		
		<?php $this->endWidget(); ?>
	</form>
</div>      
 
 

