<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Recordsofconsumption]].
 *
 * @see Recordsofconsumption
 */
class RecordsofconsumptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Recordsofconsumption[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Recordsofconsumption|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
