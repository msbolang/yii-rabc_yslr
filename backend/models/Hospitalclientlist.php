<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hospitalclientlist}}".
 *
 * @property integer $id
 * @property integer $category
 * @property string $name
 * @property string $price
 * @property string $performance_royalty
 * @property integer $status
 * @property integer $belong
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Hospitalclientlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%hospitalclientlist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'status', 'belong', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['name', 'price', 'performance_royalty', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['price', 'performance_royalty'], 'number'],
            [['name'], 'string', 'max' => 255],
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', '所属项目'),
            'name' => Yii::t('app', '客户名称'),
            'price' => Yii::t('app', '消费金额'),
            'performance_royalty' => Yii::t('app', '业绩提成'),
            'status' => Yii::t('app', '状态'),
            'belong' => Yii::t('app', '所属医生'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
                
        ];
    }

    /**
     * @inheritdoc
     * @return HospitalclientlistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalclientlistQuery(get_called_class());
    }
    
    
        public static function findcategory()
    {
            
            $arr = array();
        $arrAy = Hospitalprojectcategory::find()->asarray()->all();
//        echo '<pre>';print_r($arrAy);exit;
        if(!empty($arrAy)){
            foreach ($arrAy as $key => $value) {
                $arr[$value['id']] = $value['category_name'];
            }
          
        }
          return $arr;
    }
    
        public static function finddoctor()
    {
            $arr = array();
            $query = (new \yii\db\Query())
                 ->select('*')
                 ->from('auth_assignment AS a')
                ->leftJoin('user AS u','u.id=a.user_id')
                ->where(['a.item_name'=>'医生'])
                ->all();
   
        if(!empty($query)){
            foreach ($query as $key => $value) {
                $arr[$value['user_id']] = $value['username'];
            }
        }
          return $arr;
    }
    
    public  function getHospitalprojectcategory()
    {
       return $this->hasOne(Hospitalprojectcategory::className(), ['id'=>'category']);
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'belong']);
    }
    
    public function categoryname(){
       $category = Hospitalprojectcategory::find()->where(['id'=>$this->category])->one();
       if($category->category_name){
           return $category->category_name;
       }
    }
    
     public function doctor(){
       $belong = User::find()->where(['id'=>$this->belong])->one();
       if($belong->username){
           return $belong->username;
       }
    }
    
    
}
