<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class PagesController extends Controller
{
	public $layout = 'admin';
	public $menu = 'pages';
	
    public function actionIndex()
    {
        return $this->render('pages', ['menus' => $this->menu]);
    }
    
    public function actionUpdate($id)
    {
    	echo $id;exit;
    }
    
}
