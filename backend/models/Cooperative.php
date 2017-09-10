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
//class Cooperative extends \yii\db\ActiveRecord
class Cooperative extends TotalModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cooperative}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'coname', 'phone', 'adder', 'passportNumber', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['createuser', 'loginID', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
//            [['cooperativeNumber'], 'string', 'max' => 50],
            [['coname', 'phone', 'adder', 'passportNumber', 'loginname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
//            'cooperativeNumber' => Yii::t('app', '合作商代码'),
            'coname' => Yii::t('app', '姓名'),
            'phone' => Yii::t('app', '电话'),
            'adder' => Yii::t('app', '地址'),
            'passportNumber' => Yii::t('app', '护照号码'),
            'createuser' => Yii::t('app', '是否创建登陆账号 已创建1 0未'),
            'loginname' => Yii::t('app', '合作商登陆账号'),
            'loginID' => Yii::t('app', '登陆账号ID'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
        ];
    }

    /**
     * @inheritdoc
     * @return CooperativeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CooperativeQuery(get_called_class());
    }
}
