<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="/images/frontend/favicon.ico" />
	
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

	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php  
	  $baseUrl = Yii::app()->request->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  $cs->registerScriptFile($baseUrl.'/ddslick/jquery.ddslick.min.js');
	?>

		
</head>
<body>

<div class="container" id="page">
	
	<header>
		<hgroup>
		<?php $this->widget('application.extensions.widgets.langBox');?>	
		 	  
<!--
<div id="cssmenu">
<ul>
   <li class="active"><a href="#"><span>EU CBC IP</span></a></li>
   <li class="has-sub"><a href="#"><span>Investments profile</span></a>
      <ul>
         <li class="has-sub"><a href="#"><span>Drugi nivo</span></a>
            <ul>
               <li><a href="#"><span>Treći nivo</span></a></li>
               <li class="last"><a href="#"><span>Treći nivo dva</span></a></li>
            </ul>
         </li>
         <li class="has-sub"><a href="#"><span>Drugi nivo 2</span></a>
            <ul>
               <li><a href="#"><span>Treći nivo drugog nivoa</span></a></li>
               <li class="last"><a href="#"><span>Treći nivo drugog nivoa 2</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href="#"><span>Stranica</span></a></li>
   <li class="last"><a href="#"><span>Stranica</span></a></li>
</ul>
</div>
-->	

		</hgroup> <!-- header blocks -->	
	</header> <!-- header -->
	
	<?php $this->actionBlocks(1); ?> <!-- main navigation -->	
	
	<div id="main"> 		
		<div class="main_top">
			<?php $this->actionBlocks(2); ?>
		</div><!-- main top blocks -->
					  						  		
		<div id="main_content">
			<aside class="span4">
				<?php $this->actionBlocks(4); ?>	
			</aside> <!-- aside left blocks --> 
			<?php if (Block::model()->countByAttributes(array('block_position_id'=>5,'status_id'=>1)) > 0):?>				 	
			<aside class="span2"> 
				<?php $this->actionBlocks(5); ?>
			</aside> <!-- aside right blocks -->
			<?php endif; ?>	 	
			<div class="page_content">	
				<?php if (Block::model()->countByAttributes(array('block_position_id'=>3,'status_id'=>1)) > 0):?> 	
				<div class="content_top">
					 <?php $this->actionBlocks(3); ?>
				</div> <!-- content top blocks -->						  			 	
				<?php endif; ?>		 
				<?php echo $content; ?>	
				<?php if (Block::model()->countByAttributes(array('block_position_id'=>6,'status_id'=>1)) > 0):?>									
				<div class="content_bottom">
					<?php $this->actionBlocks(6); ?>
				</div> <!-- content bottom blocks -->		 
				<?php endif; ?>
  			</div>		
		</div> <!-- content -->		 		
		 	  
		 
		 <!--	<?php if(isset($this->breadcrumbs)):?>  
		 	<?php $this->widget('zii.widgets.CBreadcrumbs', array(  
		 		'links'=>$this->breadcrumbs,  
		 	)); ?> -->
			<!-- breadcrumbs -->
		<!--	<?php endif?>  -->
			
		<!-- 	<?php echo $content; ?> -->
		
		<div class="main_bottom">
			<?php $this->actionBlocks(7); ?>
		</div> <!-- main bottom blocks -->
	</div> <!-- main -->	
	<footer>
		<div class="f_blocks">
			<?php $this->actionBlocks(8); ?>
		</div>
		<div class="modal-footer">
			Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
		</div>	
	</footer> <!-- footer -->
</div><!-- page -->


</body>
</html>