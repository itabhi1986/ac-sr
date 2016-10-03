<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\modules\admin\controllers;

use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController {

    public $layout = '@app/modules/admin/views/layouts/admin';
    
    
}