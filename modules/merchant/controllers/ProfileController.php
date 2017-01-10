<?php

namespace app\modules\merchant\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller {

    /**
     * @inheritdoc
     */
    public $layout = "userprofile";

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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex() {
        $user_id = Yii::$app->user->getId();

        if ($user_id) {
            $model = Profile::findOne(['user_id' => $user_id]);
            
            return $this->actionView($user_id);
        } else {
            $this->redirect("/user/login/", 302);
        }
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        
        return $this->render('view', [
                    'model' => $this->findModel($id)
        ]);
    }

    public function actionUpdate() {
        $id = Yii::$app->user->getId();
        $model = Profile::find()->where(["user_id" => $id])->one();
        $model->scenario = "update_profile";
        if ($model->load(Yii::$app->request->post())) {
          
            if ($model->validate()) {
               
                $model->saveProfile(Yii::$app->request->post(), $id, '');
            } else {
                 
             print_r($model->errors);exit;
                
            }

            return $this->redirect(['view', 'id' => $id]);
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
    public function actionDelete($id) {
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
    protected function findModel($id) {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSlug() {
        $user_id = Yii::$app->user->getId();

        if ($user_id) {
            $model = Profile::findOne(['user_id' => $user_id]);
            $model->scenario = "update_slug";


            if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                $model->scenario = "update_slug";
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
            }

            if ($model->load(Yii::$app->request->post())) {
                $model->scenario = "update_slug";
                $postData = Yii::$app->request->post();
                $model->profile_slug = $postData['Profile']['profile_slug'];

                if ($model->validate()) {
                    Profile::saveProfileSlug($postData);
                     return $this->redirect(['view', 'id' => $user_id]);
                }

                return $this->redirect(['view', 'id' => $model->user_id]);
            } else {
                return $this->render('profile-slug', [
                            'model' => $model,
                ]);
            }
        } else {
            $this->redirect("/user/login/", 302);
        }
    }

}
