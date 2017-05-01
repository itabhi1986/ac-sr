<?php

namespace app\modules\merchant\controllers;

use yii\web\Controller;
use Yii;

/**
 * Default controller for the `merchant` module
 */
class DefaultController extends Controller
{
    public $layout = "userprofile";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->getId();
         
    	$model = "";
    	if($user_id){
        return $this->render('index');
        }else
        {
            $this->redirect("/user/login/",302);
        }
    }
}
