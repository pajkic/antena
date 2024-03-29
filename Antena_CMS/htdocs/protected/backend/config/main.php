<?php
$backend = dirname(dirname(__FILE__));
$frontend = dirname($backend);
$bootstrap = realpath(__DIR__) . '/../extensions/bootstrap';
$yiiwheels = realpath(__DIR__) . '/../extensions/yiiwheels';


// uncomment the following to define a path alias
Yii::setPathOfAlias('backend',$backend);
Yii::setPAthOfAlias('bootstrap',$bootstrap);
Yii::setPAthOfAlias('yiiwheels',$yiiwheels);




// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>$frontend,
	'name'=>'Antena CMS',
	'homeUrl' => '/backend.php/login',

	
	'controllerPath' => $backend.'/controllers',
    'viewPath' => $backend.'/views',
    'runtimePath' => $backend.'/runtime',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.messages.*',
		'backend.models.*',
		'backend.components.*',
		'backend.extensions.galleria.*',
		'bootstrap.helpers.TbHtml',
		'application.extensions.widgets.*'
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'000',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
	
		),
	
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
			
		),
		
		'setting'=>array('class'=>'WebSetting'),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'coreMessages'=>array(
            'basePath'=>null,
        ),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=antena',
			
			'emulatePrepare' => true,
			
			'username' => 'antena',
			'password' => 'f6511080a9',
			/*
			 'username' => 'root',
			 'password' => '',
			*/
			'charset' => 'utf8',
			'tablePrefix' => 'cms_',
		),
		
		'authManager'=>array(
        	'class'=>'CDbAuthManager',
        	'connectionID'=>'db',
        ),
		
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				
				
			),
		),
		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
               
        ),
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',   
        ),
        
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@implementacija.rs',
		
	),
	

);