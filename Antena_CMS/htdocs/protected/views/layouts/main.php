<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>
<body>
<div class="container" id="page">

	<header>
		<div class="h_blocks">
		 	header blocks
		</div> <!-- header blocks -->
	</header> <!-- header -->

	<div id="main"> 
		<div class="main_top">
			main top blocks
			<?php $this->actionBlocks(2); ?>	
		</div><!-- main top blocks -->
		
		<aside class="aside_left">
			aside left blocks
			<?php $this->actionBlocks(4); ?>	
		</aside> <!-- aside left blocks --
		
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		
		<?php echo $content; ?>
	  

		<aside class="aside_right">
			aside right blocks 	
		</aside> <!-- aside right blocks -->
		
		<div class="main_bottom">
			main bottom blocks
		</div> <!-- main bottom blocks -->
	</div> <!-- main -->
	
	<footer>
		<div class="f_blocks">
			footer blocks
		</div>
		<div class="site_info">
			Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
		</div>	
	</footer> <!-- footer -->

</div><!-- page -->
</body>
</html>