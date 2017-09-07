<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%notice}}".
 *
 * @property integer $id
 * @property string $usergroup
 * @property string $title
 * @property string $content
 * @property string $peruser
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usergroup', 'title', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['content', 'peruser'], 'string'],
            [['status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['usergroup'], 'string', 'max' => 50],
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
            'usergroup' => Yii::t('app', '发送对象'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'peruser' => Yii::t('app', '阅读者'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
        ];
    }

    /**
     * @inheritdoc
     * @return NoticeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NoticeQuery(get_called_class());
    }
}
