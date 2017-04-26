<?php

namespace cpanel\controllers;

use Yii;
use common\models\accesscontrol\AuthItem;
use common\models\accesscontrol\Authmenu;
use common\models\accesscontrol\AuthAssignment;
use common\models\accesscontrol\AuthMenuItems;
use common\models\accesscontrol\AuthItemChild;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccesscontrolController implements the CRUD actions for AuthItem model.
 */
class AccesscontrolController extends Controller {

    /**
     * @inheritdoc
     */
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex() {

        $this->layout = "accesscontrol";
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::findBySql('select * from auth_item where type=1'),
        ]);
        
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionPermissions() {

        $this->layout = "accesscontrol";
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::findBySql('select * from auth_item where type=1'),
        ]);
        
        return $this->render('list/permissions', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionRoles() {

        $this->layout = "accesscontrol";
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::findBySql('select * from auth_item where type=2'),
        ]);
        
        return $this->render('list/roles', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    /**
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionUserroles()
    {
          $this->layout = "accesscontrol";
        $dataProvider = new ActiveDataProvider([
            'query' => AuthAssignment::find(),
        ]);

        return $this->render('list/userroles', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
      /**
     * Lists all Authmenu models.
     * @return mixed
     */
    public function actionMenus()
    {
         $this->layout = "accesscontrol";
        $dataProvider = new ActiveDataProvider([
            'query' => Authmenu::find(),
        ]);

        return $this->render('list/menus', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
   /**$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    * 
    * View Pagess
    * 
    * $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    */

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
         $this->layout = "accesscontrol";
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    
    
     /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionViewmenu($id) {
        
        $this->layout = "accesscontrol";
        
        $dataProvider = new ActiveDataProvider([
           'query' => AuthMenuItems::findBySql('select * from auth_menu_items where menu_id='.$id),
        ]);        
       
        return $this->render('view/viewmenu', [
                    'model' => AuthMenu::findOne($id),
                    'dataProvider' => $dataProvider,
            ''
        ]);
    }

    
      /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionViewroles($id) {
        
        $this->layout = "accesscontrol";
        
        $dataProvider = new ActiveDataProvider([
           'query' => AuthItemChild::findBySql('select * from auth_item_child where parent="'.$id.'"'),
        ]);        
       
        return $this->render('view/viewroles', [
                    'model' => AuthItem::findOne($id),
                    'dataProvider' => $dataProvider,
            ''
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
