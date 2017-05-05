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
        $user = User::findOne([
            'username' => $this->username,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html',
                                'text' => 'passwordResetToken-text'], ['user' => $user])
                            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                            ->setTo($user->email)
                            ->setSubject('PASSWORD RESET REQUEST FOR ' . \Yii::$app->name)
                            ->send();
    }

}
