<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $adder
 * @property string $PassportNo
 * @property integer $integral
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Customer extends TotalModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'phone', 'adder', 'PassportNo', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['integral', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use', 'loginAccount'], 'integer'],
            [['name', 'phone', 'adder', 'PassportNo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '姓名'),
            'phone' => Yii::t('app', '电话'),
            'adder' => Yii::t('app', '地址'),
            'PassportNo' => Yii::t('app', '护照号'),
            'integral' => Yii::t('app', '积分'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
            'loginAccount' => Yii::t('app', '创建登陆账号'),
        ];
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find() {
        return new CustomerQuery(get_called_class());
    }


    

}
