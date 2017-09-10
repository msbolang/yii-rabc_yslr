<?php

namespace backend\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * cope mdm\admin\controllers
 */
use mdm\admin\models\form\Login;
use mdm\admin\models\form\PasswordResetRequest;
use mdm\admin\models\form\ResetPassword;
use mdm\admin\models\form\Signup;
use mdm\admin\models\form\ChangePassword;
//use mdm\admin\models\searchs\User as UserSearch;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
//use yii\web\Controller;
//use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use yii\web\NotFoundHttpException;
use yii\base\UserException;
use yii\mail\BaseMailer;
use app\models\AuthAssignment;

/**
 * UserController implements the CRUD actions for User model.
 */

/**
 * User controller
 */
class UserController extends Controller {

    private $_oldMailPath;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup', 'reset-password', 'login', 'request-password-reset'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'change-password', 'index', 'view','update', 'delete', 'create', 'activate'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'logout' => ['post'],
                    'activate' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            if (Yii::$app->has('mailer') && ($mailer = Yii::$app->getMailer()) instanceof BaseMailer) {
                /* @var $mailer BaseMailer */
                $this->_oldMailPath = $mailer->getViewPath();
                $mailer->setViewPath('@mdm/admin/mail');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result) {
        if ($this->_oldMailPath !== null) {
            Yii::$app->getMailer()->setViewPath($this->_oldMailPath);
        }
        return parent::afterAction($action, $result);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }


    
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Login
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout
     * @return string
     */
    public function actionLogout() {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * Signup new user
     * @return string
     */
    public function actionSignup() {
        $model = new Signup();
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                return $this->goHome();
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionCreate() {
        $model = new User();
        if ($model->load(Yii::$app->getRequest()->post())) {
            $post = Yii::$app->request->post();
          $model->setPassword($model->password);
          $model->generateAuthKey();
           if(isset($post['User']['group'])){
               $model->relation = $post['User']['group'];
           };
            if (!$model->validate()) {
                Yii::$app->getSession()->setFlash('error', '保存失敗');
                return $this->redirect(['user/create']);
            }

            if ($model->save()) {
                $id = $model->attributes['id'];
                $this->set_group($id);
             
                Yii::$app->getSession()->setFlash('success', '保存成功');
                
                return $this->redirect(['user/index']);
            } else {
                var_dump($model->getErrors());
                exit;
            }
        }




        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    
        
      public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!$this->updateAndCreateVerification($id)){
              Yii::$app->getSession()->setFlash('error', '保存失敗!  用户已被其他登陆账号绑定');
                return $this->redirect(['user/index']);
        }
         $post = Yii::$app->request->post();
         if(isset($post['User']['group'])){
              $model->relation = $post['User']['group'];
           };
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                $id = $model->attributes['id'];
                $this->set_group($id,true);
              Yii::$app->getSession()->setFlash('success', '保存成功');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * 绑定前验证
     */
    private function updateAndCreateVerification($id){
        $group = false;
        $relationId = false;
        $post = Yii::$app->request->post();
         if(isset($post['User']['group'])){
              $group = $post['User']['group'];
           };
           
        if(isset($post['User']['relationId'])){
               $relationId = $post['User']['relationId'];
           };  
 
        if($group&&$relationId){
             $rule = User::find()->where(['relation'=>$group,'relationId'=>$relationId])
                    ->andWhere(['!=','id',$id])
                    ->one();
             if($rule){
               return false;
             }
        } 
        return true;
    }
    
    public function set_group($userId,$up=null){
        $post = Yii::$app->request->post();
        $group = $post['User']['group'];
        if(empty($group)){
            return false;
        }
        if($up){ 
            $model = AuthAssignment::find()->where(['user_id'=>$userId])->one();
        }else{
            $model = new AuthAssignment();
        }
        $model->item_name = $group;
        $model->user_id = $userId;
        $model->created_at = time();
        if(!$model->save()){
            var_dump($model->getErrors());exit;
        };
    }
    /**
     * Request reset password
     * @return string
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionChangePassword() {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
                    'model' => $model,
        ]);
    }

    /**
     * Activate new user
     * @param integer $id
     * @return type
     * @throws UserException
     * @throws NotFoundHttpException
     */
    public function actionActivate($id) {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == User::STATUS_INACTIVE) {
            $user->status = User::STATUS_ACTIVE;
            if ($user->save()) {
                return $this->goHome();
            } else {
                $errors = $user->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->goHome();
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
