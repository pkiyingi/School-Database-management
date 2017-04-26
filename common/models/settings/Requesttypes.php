<?php

namespace common\models\settings;

use Yii;

/**
 * This is the model class for table "mst_system_requests".
 *
 * @property integer $id
 * @property string $requestName
 * @property string $description
 * @property string $module_id
 * @property string $request_code
 */
class Requesttypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_system_requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requestName', 'description', 'module_id', 'request_code'], 'required'],
            [['description'], 'string'],
            [['module_id'], 'integer'],
            [['requestName', 'request_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requestName' => 'Request Name',
            'description' => 'Description',
            'module_id' => 'Module ID',
            'request_code' => 'Request Code',
        ];
    }
}
