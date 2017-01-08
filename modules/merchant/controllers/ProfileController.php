<?php

namespace app\modules\merchant\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->getId();       
    	
    	if($user_id){
	    	 $model = Profile::findOne(['user_id' => $user_id]);
       
                return  $this->actionView($user_id);
         }
        else
        {
            $this->redirect("/user/login/",302);
        }
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = $this->findModel($id);
        return $this->render('view', [
            'model' =>  $model
        ]);
    }

    
    public function actionUpdate()
    {
        $id = Yii::$app->user->getId();
        $model =  Profile::find()->where(["user_id"=>$id])->one();
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->validate())
            {
               $model->saveProfile(Yii::$app->request->post(),$id,'');
            }
            else
            {
                
            }
           
            return $this->redirect(['view','id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
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
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSlug()
    {
        $user_id = Yii::$app->user->getId();       
    	
    	if($user_id){
	    	 $model = Profile::findOne(['user_id' => $user_id]);
                 $model->scenario= "update_slug";
       
         if ($model->load(Yii::$app->request->post())) {
              $model->scenario= "update_slug";
             if($model->validate())
             {
                 echo "Hello";exit;
             }
            return $this->redirect(['view','id' => $id]);
        }
        else {
                return $this->render('profile-slug', [
                'model' => $model,
            ]);
                }
         }
        else
        {
            $this->redirect("/user/login/",302);
        }
    }
}
