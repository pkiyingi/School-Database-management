<?php

namespace frontend\controllers;

use Yii;
use common\models\LoanDocumentuploaded;
use common\models\LoanDocumentuploadedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LoandocumentsController implements the CRUD actions for LoanDocumentuploaded model.
 */
class DocumentsController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LoanDocumentuploaded models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LoanDocumentuploadedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LoanDocumentuploaded model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LoanDocumentuploaded model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new LoanDocumentuploaded();

        if ($model->load(Yii::$app->request->post())) {

            $model->document_uploaded = UploadedFile::getInstance($model, 'document_uploaded');
            //Upload
            $file_name = uniqid() . '.' . $model->document_uploaded->extension;
            $model->document_uploaded->saveAs('attachments/' . $file_name);
            //Save details of the DB
            $model->document_uploaded = $file_name;
            $model->save();
             //Flash
            Yii::$app->session->setFlash('success', 'You have sucessfully uploaded the document');
            
            return $this->redirect('index.php?r=loan/details&id='.$model->loan_id);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LoanDocumentuploaded model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->loandocument_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LoanDocumentuploaded model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LoanDocumentuploaded model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LoanDocumentuploaded the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = LoanDocumentuploaded::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
