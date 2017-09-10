<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\myclass;

use Yii;
use yii\base\Component;
use app\models\User;
use app\models\Notice;
class UserMsg extends Component {

    public static function getMsg($userId) {
        $arr = array();
  
        if ($userId) {
            $msg = User::find()->select('msg')->asarray()->where(['id' => $userId])->one();
            if (!empty($msg['msg'])) {
                $msgIdArr = explode(',', $msg['msg']);
              
                foreach ($msgIdArr as $key => $value) {
                    if($value<0){
                        $arr[] = self::getMsgCentont(abs($value));
                    }
                    
                }
            }
        }
        return $arr;
    }

    public static function getMsgCentont($id){
       $res = Notice::find()->where(['id'=>$id])->asarray()->one();
      if(!empty($res)){
          return $res;
      }
    }
}