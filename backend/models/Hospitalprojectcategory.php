<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hospitalprojectcategory}}".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $parent
 */
class Hospitalprojectcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hospitalprojectcategory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['parent'], 'integer'],
            [['category_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_name' => Yii::t('app', '项目名称'),
            'parent' => Yii::t('app', '上级分类'),
        ];
    }

    /**
     * @inheritdoc
     * @return HospitalprojectcategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HospitalprojectcategoryQuery(get_called_class());
    }
}
