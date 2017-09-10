<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%stock}}".
 *
 * @property integer $id
 * @property integer $category
 * @property string $product_name
 * @property string $product_number
 * @property integer $number
 * @property integer $purchase_time
 * @property integer $outbound_time
 * @property string $ex_shipment_price_perbox
 * @property string $Postage_per_shipment
 * @property string $advent
 * @property integer $early_warning
 * @property string $detailed_description
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stock}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'number',   'early_warning', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
//            ['created_at', 'default', 'value' => time()],//如果 创建时间created_at为空 则设置默认值time
//            ['updated_at', 'default', 'value' => time()],
            [['purchase_time'],'purchasetime'],
             [['outbound_time'],'outboundtime'],
            
            [['product_name', 'product_number', 'number', 'purchase_time', 'ex_shipment_price_perbox', 'Postage_per_shipment', 'advent', 'early_warning', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['ex_shipment_price_perbox', 'Postage_per_shipment'], 'number'],
            [['detailed_description'], 'string'],
            [['product_name'], 'string', 'max' => 255],
            [['product_number', 'advent'], 'string', 'max' => 50],
        ];
    }

    public function outboundtime() {
     
         if(!empty($this->outbound_time)){ 
               $this->outbound_time = strtotime($this->outbound_time);
           }else{
                $this->outbound_time = '';
           }
    }
    public function purchasetime(){
        
      if($this->purchase_time){ 
        $this->purchase_time = strtotime($this->purchase_time);
      }else{
         $this->purchase_time = time();
      }
       
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', '分类'),
            'product_name' => Yii::t('app', '产品名称'),
            'product_number' => Yii::t('app', '产品编号'),
            'number' => Yii::t('app', '数量'),
            'purchase_time' => Yii::t('app', '进库时间'),
            'outbound_time' => Yii::t('app', '出库时间'),
            'ex_shipment_price_perbox' => Yii::t('app', '进货价'),
            'Postage_per_shipment' => Yii::t('app', '邮费价格'),
            'advent' => Yii::t('app', '临期'),
            'early_warning' => Yii::t('app', '预警数量'),
            'detailed_description' => Yii::t('app', '详情说明'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
     
        ];
    }

    /**
     * @inheritdoc
     * @return StockQuery the active query used by this AR class.
     */
        public  function findcategory()
    {
        $arr = array();
        $arrAy = StockCategory::find()->asarray()->all();
//        echo '<pre>';print_r($arrAy);exit;
        if(!empty($arrAy)){
            foreach ($arrAy as $key => $value) {
                $arr[$value['id']] = $value['category_name'];
            }
          
        }
          return $arr;
    }
    public static function find()
    {
        return new StockQuery(get_called_class());
    }
    
       public function getStock_category(){
        return $this->hasOne(StockCategory::className(),['id'=>'category']);
    }
    
    public function getUser(){
        return  $this->hasOne(User::className(),['id'=>'create_use']);
    }
    

}
