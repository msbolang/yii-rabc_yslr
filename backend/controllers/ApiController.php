<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cooperative;

/**
 * CooperativeController implements the CRUD actions for Cooperative model.
 */
class ApiController extends Controller
{

    /**
     * Lists all Cooperative models.
     * @return mixed
     */
    public function actionGetusers()
    {
        $post = Yii::$app->request->post();
        $info = array('status'=>0,'users'=>'');
        $users = '';
        if($post['data'] == "合作商"){
          $users = Cooperative::find()->where(['status'=>1])->asarray()->all();
         }
          if(!empty($users)){
              $str = '';
              $info['status'] = 1;
              foreach ($users as $key => $value) {
                 $str .= "<option value='".$value['id']."'>".$value['coname']."</option>";
              }
               $info['users'] = $str;
          }
     
         echo json_encode($info);
    }

}
