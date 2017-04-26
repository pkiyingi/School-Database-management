<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "listof_facilities".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $description
 */
class FacilitySearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listof_facilities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'icon', 'description'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 600]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
            'description' => 'Description',
        ];
    }
}
