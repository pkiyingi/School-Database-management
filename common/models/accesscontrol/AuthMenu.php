<?php

namespace common\models\accesscontrol;

use Yii;

/**
 * This is the model class for table "auth_menu".
 *
 * @property integer $menu_id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $client
 * @property integer $record_status
 */
class AuthMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'code', 'client'], 'required'],
            [['record_status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['code', 'client'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'name' => 'Name',
            'description' => 'Description',
            'code' => 'Code',
            'client' => 'Backend? or Frontend?',
            'record_status' => 'Record Status',
        ];
    }
}
