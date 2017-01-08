<?php

namespace app\modules\merchant\controllers;

use Yii;
use app\models\Banner;
use app\models\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller
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
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        
         $user_id = Yii::$app->user->getId();
         
    	$model = "";
    	if($user_id){
            
            $params = Yii::$app->request->queryParams;
            $params['BannerSearch']['user_id']=Yii::$app->user->getId();
            
            
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search($params);
//print_r($dataProvider);exit;
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
     * Displays a single Banner model.
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
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banner();

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
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Banner model.
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
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
