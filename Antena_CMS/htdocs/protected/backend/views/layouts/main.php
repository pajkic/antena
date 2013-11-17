<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>
<body>

<div class="container-fluid" id="page">
	<div id="header">		  	 
		<div class="navbar navbar-inverse nav">
		    <div class="navbar-inner">
		        <div class="container">
		            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </a>
		           <div class="brand"><?php echo CHtml::encode(Yii::app()->name); ?></div>			    
		          	<div class="nav-collapse collapse">				
					<div class="pull-right">
		                <ul class="nav pull-right">
		                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->user->name;?> <b class="caret"></b></a>
		                        <ul class="dropdown-menu">
		                            <li><a href="/user/preferences"><i class="icon-cog"></i> Podaci o korisniku</a></li>
		                            <li><a href="/help/support"><i class="icon-envelope"></i> Podrška</a></li>
		                            <li class="divider"></li>
		                            <li><a href="/backend.php/site/logout"><i class="icon-off"></i> Odjavi me</a></li>
		                        </ul>
		                    </li>
		                </ul>
		              </div>
		     	 </div>
		      </div>	
		    </div>	
		</div>	
	</div><!-- header -->	
         
<div class="sidebar">  			
		<?php $this->widget('bootstrap.widgets.TbNav', array(
	    'type'=>TbHtml::NAV_TYPE_PILLS, // '', 'tabs', 'pills' (or 'list')
	    'stacked'=>true, // whether this is a stacked menu
	    'items'=>array(
	        		array('label'=>'Početna', 'icon'=>'home', 'url'=>array('/site/index')),  
	        		array('label' => 'Test naslov'),
					array('label'=>'O nama', 'icon'=>'star', 'url'=>array('/site/page', 'view'=>'about')),
					array('label'=>'Kontakt', 'icon'=>'envelope', 'url'=>array('/site/contact')),
					array('label'=>'Login', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)			
	    ),
	)); ?>		
</div>	<!-- sidebar -->
	
	<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => $this->breadcrumbs, 'homeUrl' => 'index')); ?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<p>Jezik:<code><?php echo Yii::app()->language;?></code></p>
	<div id="footer" class="modal-footer">
		Copyright &copy; <?php echo date('Y'); ?> <a href="http://implementacija.rs/" target="_blank" title="Implementacija d.o.o.">Implementacija d.o.o.</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
