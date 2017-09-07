<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hospitalprojectcategory]].
 *
 * @see Hospitalprojectcategory
 */
class HospitalprojectcategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Hospitalprojectcategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hospitalprojectcategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
