<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%recordsofconsumption}}".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $SalesmanNumber
 * @property string $DoctorNumber
 * @property integer $category
 * @property string $price
 * @property integer $TimeToSpend
 * @property integer $integral
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Recordsofconsumption extends TotalModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recordsofconsumption}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id',   'price', 'TimeToSpend', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['customer_id', 'category',  'integral', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['price'], 'number'],
            [['TimeToSpend'],'setTimeToSpend'],
            [['Salesman','SalesmanCommission','Doctor','DoctorCommission','Cooperative','CooperativeCommission'],'safe']
            
        ];
    }

      public function setTimeToSpend(){
        
      if($this->TimeToSpend){ 
        $this->TimeToSpend = strtotime($this->TimeToSpend);
      }else{
         $this->TimeToSpend = time();
      }
       
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', '客户ID'),
            'Salesman' => Yii::t('app', '所属业务员'),
            'SalesmanCommission' => Yii::t('app', '业务员提成'),
            'Doctor' => Yii::t('app', '所属医生'),
            'DoctorCommission' => Yii::t('app', '医生提成'),
            'Cooperative' => Yii::t('app', '所属合作商'),
            'CooperativeCommission' => Yii::t('app', '合作商提成'),
            'Cooperative' => Yii::t('app', '所属合作商'),
            'category' => Yii::t('app', '所做项目'),
            'price' => Yii::t('app', '消费价格'),
            'TimeToSpend' => Yii::t('app', '消费时间'),
            'integral' => Yii::t('app', '客户加积分'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
        ];
    }

    /**
     * @inheritdoc
     * @return RecordsofconsumptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordsofconsumptionQuery(get_called_class());
    }
    
  
    
    
    
     public function getCustomer(){  
        return $this->hasOne(Customer::className(),['id'=>'customer_id']);
     }
     
         public function getHospitalprojectcategory(){  
        return $this->hasOne(Hospitalprojectcategory::className(),['id'=>'category']);
     }
     
     
     /**
      * 
      * @return type  view function
      */
        public function getViewCustomerId() {
        $obj = Customer::find()->where(['id' => $this->customer_id])->one();
        if ($obj) {
            return $obj->name;
        }
    }
    
    public function getViewCategory(){
          $obj = Hospitalprojectcategory::find()->where(['id' => $this->category])->one();
        if ($obj) {
            return $obj->category_name;
        }
    }
       
    
}
