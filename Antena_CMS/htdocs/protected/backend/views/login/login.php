<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>


    
<div class="account-wall">
	<img class="profile-img" src="/images/implementacija.png" alt="">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
	'layout' => 'signin',
	)); 
	?>
	    
    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisničko ime')); ?>
    <?php echo $form->error($model,'username'); ?>
    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'id' => 'password','placeholder' => 'Lozinka', )); ?>
    <?php echo $form->error($model,'password'); ?>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Prijavi me</button>

    <?php $this->endWidget(); ?>

</div>

<!--
	
<div class="account-wall">
	<img class="profile-img" src="/htdocs/protected/backend/extensions/bootstrap/assets/img/implementacija.png" alt="">
	<form class="form-signin">
		<input type="text" class="form-control" placeholder="Korisničko ime" required autofocus>
		<input type="password" class="form-control" placeholder="Lozinka" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Prijavi me</button>     
	</form>
</div>      
 
-->