<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity_log".
 *
 * @property integer $id
 * @property integer $user_notified
 * @property integer $created_at
 * @property string $message
 * @property string $url
 * @property string $notif_type
 * @property integer $logged_in_user
 * @property boolean $email_sent
 * @property integer $ref_id
 */
class ActivityLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_notified', 'message', 'url', 'notif_type', 'logged_in_user'], 'required'],
            [['user_notified', 'created_at', 'logged_in_user', 'ref_id'], 'integer'],
            [['message'], 'string'],
            [['email_sent'], 'boolean'],
            [['url'], 'string', 'max' => 4000],
            [['notif_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_notified' => 'User Notified',
            'created_at' => 'Created At',
            'message' => 'Message',
            'url' => 'Url',
            'notif_type' => 'Notif Type',
            'logged_in_user' => 'Logged In User',
            'email_sent' => 'Email Sent',
            'ref_id' => 'Ref ID',
        ];
    }
}
