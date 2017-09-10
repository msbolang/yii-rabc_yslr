<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    
    'modules' => [
        
        /*********yii2-admin*******/
        'admin' => [ 
            'class' => 'mdm\admin\Module', 
    ],
    'aliases' => [ 
            '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
      /*********end*******/    
        
    ],
    


    'components' => [
        
        /*
         * *自定义类
         */
      'userMsg' => [
            'class' => 'app\myclass\UserMsg'                       // 'class' => 'app\components\Gettoken'
        ], 
        
        'myHelper' =>[
            'class' => 'app\myclass\MyHelper'
        ],
        
        
            /*********yii2-admin*******/
        //components数组中加入authManager组件,有PhpManager和DbManager两种方式, 
//PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库. 
    'authManager' => [ 
        'class' => 'yii\rbac\DbManager', 
        'defaultRoles' => ['guest'], 
        ], 
            /*********end******/
        
        
        /***RABC**/
        //将vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app目录下的layouts和site 覆盖backend下面的views目录的layouts和site后 无需下面的view配置
//        'view' => [
//            'theme' => [
//                'pathMap' => [ 
//                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],
        
        
        'urlManager' => [ 
            //用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL， 
            // Yii2.0中改称美化。 
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。 
            'enablePrettyUrl' => true, 
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则， 
            // 否则认为是无效路由。 
            // 这个选项仅在 enablePrettyUrl 启用后才有效。 
            'enableStrictParsing' => false, 
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。 
            'showScriptName' => false, 
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。 
            'suffix' => '', 
            'rules' => [ 
                    "/"=>"/view", 
                    "/"=>"/"
            ],
        ],
        /***RABC***/
        
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    
    /**
     * 配置未登陆用户访问的节点
     * 因有多层权限检测配置 rabc  这里as access配置所有用户可以访问的路由  这是最外层的配置检测
     */
  'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/index',
            'site/login',
            'site/logout',
            'site/error',
            'gii/*',
            'debug/*'
         // 'admin/*',//允许所有人访问admin节点及其子节点
        ]
    ],
    
    
    'params' => $params,
];
