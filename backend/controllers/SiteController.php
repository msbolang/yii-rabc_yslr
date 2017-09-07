<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
//     使用rabc 就不需要这里检测
//         if(Yii::$app->user->isGuest){
//            return $this->goHome();
//        }
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        /**
                         * 配置没有登陆的用户可以访问登陆和404页面
                         */
                        'actions' => ['login','error'],
                        'allow' => true,
                         'roles' => ['?'], //?代表没有登陆的用户
                    ],
                    [
                        'actions' => ['logout', 'index', 'error'], //登陆的用户可以访问退出，首页，错误页面 其他访问根据rabc权限设置而定
                        'allow' => true,
                        'roles' => ['@'],//代表登陆的用户
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
