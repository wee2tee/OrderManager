<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Istab]].
 *
 * @see Istab
 */
class IstabQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Istab[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Istab|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
