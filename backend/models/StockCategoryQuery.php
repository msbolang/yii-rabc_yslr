<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StockCategory]].
 *
 * @see StockCategory
 */
class StockCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StockCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StockCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
