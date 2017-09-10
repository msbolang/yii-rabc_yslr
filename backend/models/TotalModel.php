<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cooperative}}".
 *
 * @property integer $id
 * @property string $cooperativeNumber
 * @property string $coname
 * @property string $phone
 * @property string $adder
 * @property string $passportNumber
 * @property integer $createuser
 * @property string $loginname
 * @property integer $loginID
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class TotalModel extends \yii\db\ActiveRecord
{
     public function getcategory(){
      $obj = StockCategory::find()->where(['id'=>$this->category])->one();
      if($obj){
          return $obj->category_name;
      }
    }
    
    public function getUser($do=false) {
        $id =  $this->create_use;
        $obj = User::find()->where(['id' => $id])->one();
        if ($obj) {
            return $obj->username;
        }
    }
}
