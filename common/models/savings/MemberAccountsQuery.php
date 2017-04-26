<?php

namespace common\models\savings;

/**
 * This is the ActiveQuery class for [[MemberAccounts]].
 *
 * @see MemberAccounts
 */
class MemberAccountsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MemberAccounts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MemberAccounts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
