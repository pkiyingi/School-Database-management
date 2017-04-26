<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model {

    public $username;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string'],
            ['username', 'exist',
                'targetClass' => '\common\models\User',
                // 'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such username.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail() {


        if (User::setPasswordResetToken($this->username)) {
            $user = User::findByUsername($this->username);
            return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html',
                                'text' => 'passwordResetToken-text'], ['user' => $user])
                            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                            ->setTo($user->email)
                            ->setSubject('PASSWORD RESET REQUEST FOR ' . \Yii::$app->name)
                            ->send();
        }

        return false;
    }

}
