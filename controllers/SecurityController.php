<?php

namespace app\controllers;

use app\models\User;

use app\models\Profile;

use dektrium\user\controllers\SecurityController as BaseSecurityController;

use dektrium\user\Finder;
use dektrium\user\models\LoginForm;
use dektrium\user\Module;
use Yii;
use yii\authclient\AuthAction;
use yii\authclient\ClientInterface;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use dektrium\user\traits\AjaxValidationTrait;

class SecurityController extends BaseSecurityController
{    
      public $layout = "@app/views/layouts/login";  

    public function actionLogin()
    {
       // var_dump(\Yii::$app->user->isGuest);exit;
       if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

      
        $model = \Yii::createObject(LoginForm::className());

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
			
        	$user_id = Yii::$app->user->getId();
               
                
			if(Yii::$app->user->can("admin")){
				 return $this->redirect('/admin/',302);			
			}			
			else
			{
				return $this->redirect('/merchant/',302);
			}
			
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
    
}