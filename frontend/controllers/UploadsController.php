<?php

namespace frontend\controllers;

use Yii;
use common\models\UploadedFiles;
use yii\web\UploadedFile;

class UploadsController extends \yii\web\Controller {

    /**
     * Upload Files
     * @return type
     */
    public function actionUpload($module, $ref) {
        $model = new UploadedFiles();
        if (Yii::$app->request->isPost) {
            $attachment_files = UploadedFile::getInstance($model, 'attachment');
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->upload($attachment_files, $model)) {
                Yii::$app->session->setFlash('success', 'File successfully upladed');
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            $model->module_code = $module;
            $model->ref_id = $ref;
            return $this->renderPartial('upload', ['model' => $model]);
        }
    }

}
