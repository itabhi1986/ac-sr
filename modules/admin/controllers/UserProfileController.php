<?php

namespace app\modules\admin\controllers;

class UserProfileController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
       
        return $this->render('index');
    }

}
