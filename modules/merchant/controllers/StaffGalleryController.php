<?php

namespace app\modules\merchant\controllers;

use Yii;
use app\models\StaffGallery;
use app\models\StaffGallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StaffGalleryController implements the CRUD actions for StaffGallery model.
 */
class StaffGalleryController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = "userprofile";
    public function behaviors()
    {
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
     * Lists all StaffGallery models.
     * @return mixed
     */
    public function actionIndex()
    {
         $user_id = Yii::$app->user->getId();
         
    	$model = "";
    	if($user_id){
            
        $params = Yii::$app->request->queryParams;
        $params['StaffGallerySearch']['user_id']=Yii::$app->user->getId();
        $searchModel = new StaffGallerySearch();
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {
            $this->redirect("/user/login/",302);
        }
    }

    /**
     * Displays a single StaffGallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StaffGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StaffGallery();

        if ($model->load(Yii::$app->request->post())) {
            
            $image = UploadedFile::getInstance($model, 'path');
            $user_id = Yii::$app->user->getId();
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,Yii::$app->request->post());
                    if($img_res)
                    {
                        $model->path= $img_res;
                        $model->save();
                        
                              
                      
                    }
                     return $this->redirect(['view', 'id' => $model->id]);
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StaffGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $image = UploadedFile::getInstance($model, 'path');
            $user_id = Yii::$app->user->getId();
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,Yii::$app->request->post());
                    if($img_res)
                    {
                        $model->path= $img_res;
                        $model->save();
                        
                              
                      
                    }
                     return $this->redirect(['view', 'id' => $model->id]);
            }
 else {
     
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
             }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StaffGallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StaffGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaffGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaffGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
