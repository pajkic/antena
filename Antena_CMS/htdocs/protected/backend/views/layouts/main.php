<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="/images/backend/favicon.ico" />
	
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
		                       <!--     <li><a href="/backend.php/user/view/<?php echo Yii::app()->user->id;?>"><i class="icon-cog"></i> <?php echo Yii::t('app','Podaci o korisniku');?></a></li>
		                            <li><a href="/backend.php/site/contact"><i class="icon-envelope"></i> <?php echo Yii::t('app','Podrška');?></a></li> 	
		                            <li class="divider"></li>  -->
		                            <li><a href="/backend.php/site/logout"><i class="icon-off"></i> <?php echo Yii::t('app','Odjavi me');?></a></li>
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
	        		array('label'=>Yii::t('app','Početna'), 'icon'=>'home', 'url'=>array('/site/index')),  
	        		array('label'=>Yii::t('app','Članci'), 'icon'=>'file', 'url'=>array('/post'), 'visible' => $this->userData->level>=10),
	        		array('label'=>Yii::t('app','Kategorije'), 'icon'=>'list', 'url'=>array('/term'), 'visible' => $this->userData->level>=40),
	        		array('label'=>Yii::t('app','Stranice'), 'icon'=>'book', 'url'=>array('/page'), 'visible' => $this->userData->level>=20),
	        		array('label'=>Yii::t('app','Galerije'), 'icon'=>'picture', 'url'=>array('/gallery'), 'visible' => $this->userData->level>=20), 		 
	        		array('label'=>Yii::t('app','Navigacija'), 'icon'=>'tasks', 'url'=>array('/menu'), 'visible' => $this->userData->level>=20),
	        		array('label'=>Yii::t('app','Blokovi'), 'icon'=>'magnet', 'url'=>array('/block'), 'visible' => $this->userData->level>=40),
	        		array('label'=>Yii::t('app','Korisnici'), 'icon'=>'user', 'url'=>array('/user'), 'visible' => $this->userData->level>=30),
	        		array('label'=>Yii::t('app','Jezici'), 'icon'=>'leaf', 'url'=>array('/language'), 'visible' => $this->userData->level>=40),
	        		
					array('label'=>Yii::t('app','Rent-A-Car'), 'icon'=>'', 'url'=>array(''), 'visible' => $this->userData->level>=20), 
	        		array('label'=>Yii::t('app','Države'), 'icon'=>'globe', 'url'=>array('/state'), 'visible' => $this->userData->level>=30),
	        		array('label'=>Yii::t('app','Gradovi'), 'icon'=>'circle-arrow-down', 'url'=>array('/city'), 'visible' => $this->userData->level>=30),
	        		array('label'=>Yii::t('app','Lokacije'), 'icon'=>'map-marker', 'url'=>array('/location'), 'visible' => $this->userData->level>=30),
	        		array('label'=>Yii::t('app','Cenovnici'), 'icon'=>'calendar', 'url'=>array('/pricelist'), 'visible' => $this->userData->level>=20),	        		
	        		array('label'=>Yii::t('app','Vozila'), 'icon'=>'plane', 'url'=>array('/vehicle'), 'visible' => $this->userData->level>=20),
	        		array('label'=>Yii::t('app','Karakteristike vozila'), 'icon'=>'minus', 'url'=>array('/vehiclefeature'), 'visible' => $this->userData->level>=30),
	        		
	        		//array('label'=>Yii::t('app','Meniji'), 'icon'=>'th', 'url'=>array('/menu'), 'visible' => !$this->userData->level<30),
	        		//array('label'=>Yii::t('app','Kategorije članaka'), 'icon'=>'category', 'url'=>array('/term'), 'visible' => $this->userData->level>=40),
					// array('label'=>Yii::t('app','O nama'), 'icon'=>'star', 'url'=>array('/site/page', 'view'=>'about')),
					// array('label'=>Yii::t('app','Kontakt'), 'icon'=>'envelope', 'url'=>array('/site/contact')),
					array('label'=>'Prijava', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest)
					// array('label'=>Yii::t('app','Odjava') . ' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)			
	    ),
	)); ?>	


</div>	<!-- sidebar -->
	<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array('links' => $this->breadcrumbs,'homeUrl' => Yii::app()->getBaseUrl().'/backend.php/site/index'));?>
	
	
	<?php echo $content; ?>

	<div class="clear"></div>
	
	<div id="footer" class="modal-footer">
		Copyright &copy; <?php echo date('Y'); ?> <a href="http://implementacija.rs/" target="_blank" title="Implementacija d.o.o.">Implementacija d.o.o.</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
