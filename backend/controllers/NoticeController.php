<?php

namespace backend\controllers;

use Yii;
use app\models\Notice;
use app\models\SearchNotice;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
/**
 * NoticeController implements the CRUD actions for Notice model.
 */
class NoticeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchNotice();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      

    
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $userId = Yii::$app->user->getId();
        $admin = \app\models\AuthAssignment::find()->where(['user_id'=>$userId,'item_name'=>ADMINNAME])->one();
        $msg = User::find()->select('msg')->asarray()->where(['id'=>$userId])->one();
        if(empty($msg)){
            echo '访问出错！';exit;
        }
        $true = false;
        $msgArr = explode(',', $msg['msg']); 
        
        foreach ($msgArr as $key => $value) {
            if(abs($value)==$id){ 
                $true = true;
                $this->setMyMsg($msgArr,$userId,$id);
            }
        }

   
        if($admin||$true){
            
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    }

    private function setMyMsg($msgArr,$userId,$id){
        $model = User::find()->where(['id'=>$userId])->one();
          foreach ($msgArr as $key => $value) {
               if(abs($value)==$id){ 
                   $msgArr[$key] = abs($value);
               }
          }
         $model->msg =  implode(',',$msgArr);
         if(!$model->save(false)){
             var_dump($model->getErrors());exit;
         }
    }
    /**
     * Creates a new Notice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notice();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = $model->attributes['id'];
            $model->setUserMsg($id);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Notice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->deleteUserMsg($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Notice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function deleteUserMsg($id) {
        $userArr = User::find()->select('id')->asArray()->all();
        foreach ($userArr as $key => $val) {
                $model = User::find()->where(['id' => $val['id']])->one();
                $msgArr = explode(',',$model->msg); 
                $f = '-'.$id;
                foreach ($msgArr as $k=>$v){
                    if($v==$f || $v==$id){
                        unset($msgArr[$k]);
                    }
                }
                $msgStr = implode(',',$msgArr);
                $model->msg = $msgStr;
                if(!$model->save(FALSE)){
                    var_dump($model->getErrors());exit;
                };
            }
    }
}
