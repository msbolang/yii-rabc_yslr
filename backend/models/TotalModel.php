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
    
    /**
     * 
     * @param type $do
     * @return type 获取view页面使用的创建人 
     */
    public function getUserView($do=false) {
        $id =  $this->create_use;
        $obj = User::find()->where(['id' => $id])->one();
        if ($obj) {
            return $obj->username;
        }
    }
    
    /**
     * 
     * @return type获取客户列表
     */
      public function getCustomerName(){
        $arr = array();
        $arrAy = Customer::find()->asarray()->all();
//        echo '<pre>';print_r($arrAy);exit;
        if(!empty($arrAy)){
            foreach ($arrAy as $key => $value) {
                $arr[$value['id']] = $value['name'];
            }
          
        }
          return $arr;
    }
    
    /**
     * 获取项目列表 
     */
    
      public function getCategoryArr(){
        $arr = array();
        $arrAy = Hospitalprojectcategory::find()->asarray()->all();

        if(!empty($arrAy)){
            foreach ($arrAy as $key => $value) {
                $arr[$value['id']] = $value['category_name'];
            }
          
        }
          return $arr;
    }
    
    /*
     * 获取员工 医生 合作商 列表
     */
    
  public static function findUserGroupName($param)
    {
            $arr = array();
            $query = (new \yii\db\Query())
                 ->select('*')
                 ->from('auth_assignment AS a')
                ->leftJoin('user AS u','u.id=a.user_id')
                ->where(['a.item_name'=>$param])
                ->all();
   
        if(!empty($query)){
            foreach ($query as $key => $value) {
                $arr[$value['user_id']] = $value['username'];
            }
        }
          return $arr;
    }
    
}
