<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%marketingplan}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Marketingplan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%marketingplan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['content'], 'string'],
            [['status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
        ];
    }

    /**
     * @inheritdoc
     * @return MarketingplanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarketingplanQuery(get_called_class());
    }
}
