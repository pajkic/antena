<?php

 //* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('app','Dobrodošli u ');?> <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
<?php
$_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/".Yii::app()->user->id; // URL for the uploads folder
$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/".Yii::app()->user->id; // path to the uploads folder
?>


<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array( 
	'id'=>'smthng-form', 
	// Please note: When you enable ajax validation, make sure the corresponding 
	// controller action is handling ajax validation correctly. 
	// There is a call to performAjaxValidation() commented in generated controller code. 
	// See class documentation of CActiveForm for details on this. 
	'enableAjaxValidation' => false, 
	'layout' => '', 
	));  
	?> 
<div class="row">
    <?php echo $form->labelEx(User::model(),'login'); ?>
    <?php echo $form->textArea(User::model(), 'login', array('id'=>'editor1')); ?>
    <?php echo $form->error(User::model(),'login'); ?>
</div>

<?php $this->endWidget(); ?>
 
<script type="text/javascript">
    CKEDITOR.replace( 'editor1', {
         filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
         filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
         filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
         filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
         filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
         filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
    });
</script>
