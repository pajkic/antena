<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Antena Site',
	'sourceLanguage' => 'sr',
	'Language' => 'sr',

	// preloading 'log' component
	'preload'=>array('log'),

	 // path aliases
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
    
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.messages.*',
		'bootstrap.helpers.TbHtml',
		
	),

	// application modules
	'modules'=>array(
		 'gii' => array(
            'generatorPaths' => array('bootstrap.gii'),
     ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'000',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				
				'lang/<lang:.*?>'=>'',
				'' => 'lang/sr',
			 	'post/<id:\d+>/<title:.*?>/lang/<lang:.*?>'=>'post/view',
                'posts/<tag:.*?>'=>'post/index',
			 	'term/<id:\d+>/<title:.*?>lang/<lang:.*?>'=>'term/view',
                'terms/<tag:.*?>'=>'term/index',
                
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			  /*
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			   */ 
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=antena',
			//'connectionString' => 'mysql:host=localhost;dbname=antena',
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
				 * 
				 */
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@implementacija.rs',
	),
	
	
	
);