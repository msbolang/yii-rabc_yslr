<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%staff}}".
 *
 * @property integer $id
 * @property integer $position_id
 * @property integer $induction_time
 * @property integer $departure_time
 * @property string $WorkingPlace
 * @property string $SalesmanNumber
 * @property string $department
 * @property string $name
 * @property string $eag
 * @property integer $sex
 * @property string $height
 * @property string $weight
 * @property string $email
 * @property string $wechat
 * @property string $phone
 * @property string $adder
 * @property string $remarks
 * @property integer $createuser
 * @property string $loginname
 * @property integer $loginID
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%staff}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_id', 'induction_time', 'departure_time', 'WorkingPlace', 'SalesmanNumber', 'department', 'name', 'sex', 'email', 'createuser', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['position_id', 'induction_time', 'departure_time', 'sex', 'createuser', 'loginID', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['height', 'weight'], 'number'],
            [['remarks'], 'string'],
            [['WorkingPlace', 'SalesmanNumber', 'department', 'email', 'wechat', 'phone', 'adder', 'loginname'], 'string', 'max' => 255],
            [['name', 'eag'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'position_id' => Yii::t('app', '职位'),
            'induction_time' => Yii::t('app', '入职时间'),
            'departure_time' => Yii::t('app', '离职时间'),
            'WorkingPlace' => Yii::t('app', '工作地点'),
            'SalesmanNumber' => Yii::t('app', '编号'),
            'department' => Yii::t('app', '部门'),
            'name' => Yii::t('app', '姓名'),
            'eag' => Yii::t('app', '年龄'),
            'sex' => Yii::t('app', '性别1男 0女'),
            'height' => Yii::t('app', '身高 单位cm'),
            'weight' => Yii::t('app', '体重 单位kg'),
            'email' => Yii::t('app', '邮箱'),
            'wechat' => Yii::t('app', '微信'),
            'phone' => Yii::t('app', '电话'),
            'adder' => Yii::t('app', '现住址'),
            'remarks' => Yii::t('app', '备注'),
            'createuser' => Yii::t('app', '是否创建登陆账号 已创建1 0未'),
            'loginname' => Yii::t('app', '登陆账号'),
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
     * @return StaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaffQuery(get_called_class());
    }
}
