<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cooperative]].
 *
 * @see Cooperative
 */
class CooperativeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Cooperative[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cooperative|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
