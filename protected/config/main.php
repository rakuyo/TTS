<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
require_once( dirname(__FILE__) . '/../components/helpers.php');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Archipelago',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
	),

    'theme'=>'arc',
	'modules'=>array(
		
	        'user'=>array(

		    'tableUsers'=>'arcusers.users',

		    'tableProfiles'=>'arcusers.profiles',

		    'tableProfileFields'=>'arcusers.profiles_fields',

	            # encrypting method (php hash function)
	            'hash' => 'md5',
 
	            # send activation email
	            'sendActivationMail' => true,
 
        	    # allow access for non-activated users
	            'loginNotActiv' => false,
 
	            # activate user on registration (only sendActivationMail = false)
	            'activeAfterRegister' => false,
 
        	    # automatically login from registration
	            'autoLogin' => true,
 
	            # registration path
	            'registrationUrl' => array('/user/registration'),
 
	            # recovery password path
	            'recoveryUrl' => array('/user/recovery'),
 
	            # login form path
	            'loginUrl' => array('/user/login'),
 
	            # page after login
	            'returnUrl' => array('/user/profile'),
 
	            # page after logout
	            'returnLogoutUrl' => array('/user/login'),

	        ),

		'rights'=>array(

	               'superuserName'=>'Admin', // Name of the role with super user privileges. 
        	       'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
	               'userIdColumn'=>'id', // Name of the user id column in the database. 
	               'userNameColumn'=>'username',  // Name of the user name column in the database. 
	               'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
	               'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
	               'displayDescription'=>true,  // Whether to use item description instead of name. 
	               'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
	               'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
 
	               'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
	               //'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
	               //'appLayout'=>'application.views.layouts.main', // Application layout. 
	               //'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
	               'install'=>false,  // Whether to enable installer. 
	               'debug'=>false, 
		),

		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'neilneilneil',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*','::1'),
                       'generatorPaths'=>array(
                         'bootstrap.gii',
                        ),
		),
		
	),

	// application components
		'components'=>array(
		   'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => true,
			'fontAwesomeCss'=>true,
		),
		'user'=>array(
			'class'=>'RWebUser',
			//enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
		),
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Authenticated','Guest'),
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=terminal',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'mysqladmin',
			'charset' => 'utf8',
			'tablePrefix'=>'',
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
               'ePdf' => array(
                 'class'         => 'ext.yii-pdf.EYiiPdf',
                 'params'        => array(
                   'mpdf'     => array(
                     'librarySourcePath' => 'application.vendors.mpdf.*',
                     'constants'         => array(
                       '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                     ),
                     'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                   /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                 )*/
                   ),
                   'HTML2PDF' => array(
                     'librarySourcePath' => 'application.vendors.html2pdf.*',
                     'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                     'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                     'orientation' => 'P', // landscape or portrait orientation
                     'format'      => 'A4', // format A4, A5, ...
                     'language'    => 'en', // language: fr, en, it ...
                     'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                     'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                     'marges'      => array(0,0,0,0), // margins by default, in order (left, top, right, bottom)
                      ),
                   )
                 ),
               ),
    //...
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'neil@imperium.ph',
	),
);
