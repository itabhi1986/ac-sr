<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controllers;

use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use app\models\RegistrationForm;


class RegistrationController extends BaseRegistrationController {
    public $layout = "@app/views/layouts/login";
    public function actionRegister()
    {
       
        $model = \Yii::createObject(RegistrationForm::className());
         
        $this->performAjaxValidation($model);
        
        if (\Yii::$app->request->post()) {
            $postData = \Yii::$app->request->post();
            
            
            $model->name = $postData['register-form']['name'];
            $model->username = $postData['register-form']['username'];
            $model->email = $postData['register-form']['email'];
            $model->password = $postData['register-form']['password'];
            $model->phone = $postData['register-form']['phone'];
            
            
            
            if(!$model->register()){
                
            }
            else
            {
               
                return $this->render('/registration/thankyou');
                
            }
       
        }
        return $this->render('register', [
                    'model' => $model,
             'module' => $this->module,]
    );

    }
     
         
            
            
            
            
            
            
            
            
            
            
            
            
            
            
}
?>
