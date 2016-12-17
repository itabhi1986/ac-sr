<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'Application Name',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'i1WhWzvuwgFy_avRDVMBsc9BUvxHk6dj',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
/*         'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
 */        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
	        'transport' => [
	            'class' => 'Swift_SmtpTransport',
	            'host' => 'smtp.gmail.com',
	            'username' => 'infosearch2city@gmail.com',
	            'password' => '1jaisairam9992081931',
	            'port' => '587',
	            'encryption' => 'tls',
	        ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'authManager'  => [
	        'class'        => 'yii\rbac\DbManager',
	        //            'defaultRoles' => ['guest'],
        ],
        'urlManager' => [
	        'enablePrettyUrl' => true,
	        'showScriptName' => false,
	        /* 'rules' => array(
	        		'<controller:\w+>/<id:\d+>' => '<controller>/view',
	        		'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
	        		'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	        ), */
		'rules' => [
			'' => '/site/index', 
                        '/search/'=>'/site/search-profile/',
                        'site/logout/'=> 'site/logout/',
                        'user/logout/'=> 'user/security/logout/',
                        'site/about/'=>'site/about/',
                        'site/contact-us/'=>'site/contact-us/',
                        'user/register/'=>'user/registration/register/',
                        'user-profile/index/'=>'user-profile/index/',
                        'user-profile/photo-gallery/'=> 'user-profile/photo-gallery/',
                        'user-profile/profile-image/'=> 'user-profile/profile-image/',
                         'user-profile/get-cities'=>'user-profile/get-cities',
                        'user-profile/<action:\w+>/'=>'user-profile/<action>/',
                        'user/login/'=>'user/security/login/',
                          [
                               'pattern' => 'sitemap-schedule',
                               'route' => 'site/sitemap-schedule',
                               'suffix' => '.xml',
                            ],
                          'network'=>'site/network',
                          [
                               'pattern' => 'sitemap-networks-<page>',
                               'route' => 'site/sitemap-networks',
                               'suffix' => '.xml',
                            ],
                            [
                               'pattern' => 'sitemap-series-<page>',
                               'route' => 'site/sitemap-series',
                               'suffix' => '.xml',
                            ],
                          [
                               'pattern' => 'sitemap-episodes-<page>',
                               'route' => 'site/sitemap-episodes',
                               'suffix' => '.xml',
                            ],                   
                          
                         
                          'admin/'=>'admin/default/',
                          'admin/<controller:\w+>' => 'admin/<controller>/index',
                          'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                          'user/<controller:\w+>' => 'user/<controller>/index',
                          'user/<controller:\w+>/<action:\w+>' => 'user/<controller>/<action>',
                          '<module:user>/<controller:\w+>/<action:\w+>' => 'user/<controller>/<action>',
                           '<slug_url>'=>'/site/catgories-slug',
                           '<slug_url>/<profile_url>'=>'/site/profile-slug',
                         
                           
			],
              'suffix' => '/',
	     ],
	     'view' => [
		     'theme' => [
			     'basePath' => '@app/web/themes/searchview',
			     'baseUrl' => '@web/themes/searchview',
				 'pathMap' => [
				     	'@app/views' => '@app/themes/searchview',
					 '@dektrium/user/views' => '@app/views'
				  ],
		     ],
	     ],
    ],
    'params' => $params,
	'modules' => [
	    'user' => [
	    	'class' => 'dektrium\user\Module',
	    	'enableUnconfirmedLogin' => true,
	    	'confirmWithin' => 21600,
	    	'cost' => 12,
	    	'admins' => ['admin'],
                'controllerMap' => [
				'registration' => 'app\controllers\RegistrationController',			
				//'settings'	=> 'app\controllers\SettingsController',
				'security'	=> 'app\controllers\SecurityController',
				'admin' => 'app\modules\admin\controllers\AdminController',
              
			],
                
			'modelMap' => [
				'RegistrationForm' => 'app\models\RegistrationForm',
				'Profile' => 'app\models\Profile',
				'User' => 'app\models\User',
                           
				//'SettingsForm' =>'app\models\SettingsForm'
		
			],
                
	    ],
	    'rbac' => [
	    	'class' => 'dektrium\rbac\Module',
	    ],
	    'events' => [
	    	'class' => 'app\modules\events\events',
	    ],
	    'redactor' => [
	    	'class' => 'yii\redactor\RedactorModule',
	    	'uploadDir' => '@webroot/uploads/redactor',
	    	'uploadUrl' => '@web/uploads/redactor',
	    	'imageAllowExtensions'=>['jpg','png','gif']
	    	],
	    'admin' => [
	    	'class' => 'app\modules\admin\admin',
                'as access' => [
                           'class' => 'yii\filters\AccessControl',
                           'rules' => [
                                   [
                                           'allow' => true,
                                           'roles' => ['admin'],
                                   ]
                           ]
                   ],
	    ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
