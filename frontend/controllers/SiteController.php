<?php

namespace frontend\controllers;

use Yii;
use common\models\member\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use mPDF;

/**
 * Site controller
 */
class SiteController extends Controller {

    public $freeAccess = true;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index','reset-password'],
                'rules' => [
                    [
                        'actions' => ['signup','reset-password'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $model = new LoginForm();
        $user = Yii::$app->user;
        
        if ($user->isGuest) { //go to the login page
            return $this->render('login', ['model' => $model,]);
        } else {
            $this->layout="memberprofile";
            return $this->render('index');
        }
    }

    public function actionTestDbConn() {
         $this->layout = 'frontpage';
        return $this->render('test-db-conn');
    }

    public function actionLogin() {
        $this->layout = 'frontpage';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //Go to the home page
            return $this->goBack();
        } else {
            return $this->render('login', ['model' => $model,]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', ['model' => $model,]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', ['model' => $model,]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        $this->layout = "frontpage";
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
         $this->layout = "frontpage";
		 
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
		
	
            $model->resetPassword();
        if ($model->load(Yii::$app->request->post())  && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            //return $this->goHome();
            
            return $this->actionLogin();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    //Create PDF
    public function actionCreatepdf() {
        $mpdf = new mPDF;
        $mpdf->WriteHTML($this->renderPartial('../member/profile'));
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }

}
