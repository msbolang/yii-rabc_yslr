<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%stock_category}}".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $parent
 */
class StockCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stock_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
             [['category_name'], 'unique'],
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
            'category_name' => Yii::t('app', '分类名称'),
            'parent' => Yii::t('app', '上级分类'),
        ];
    }

    /**
     * @inheritdoc
     * @return StockCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockCategoryQuery(get_called_class());
    }
    
        
 
}
