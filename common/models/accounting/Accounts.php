<?php

namespace common\models\accounting;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property string $id
 * @property string $account_no
 * @property string $name
 * @property integer $branch_no
 * @property string $branch_id
 * @property string $r_id
 * @property integer $account_type_id
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_no', 'branch_id', 'r_id', 'account_type_id'], 'integer'],
            [['account_type_id'], 'required'],
            [['account_no'], 'string', 'max' => 250],
            [['name'], 'string', 'max' => 100],
            [['account_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_no' => 'Account No',
            'name' => 'Name',
            'branch_no' => 'Branch No',
            'branch_id' => 'Branch ID',
            'r_id' => 'R ID',
            'account_type_id' => 'Account Type ID',
        ];
    }
}
