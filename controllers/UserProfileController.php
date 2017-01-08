<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Profile;
use app\models\States;
use app\models\Cities;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\models\Category;
use app\models\PhotoGallery;
use yii\web\UploadedFile;
use app\models\Banner;
use app\models\Profileimage;
use app\models\Links;
use yii\db\ActiveRecord;
use app\models\StaffGallery;
use yii\data\ActiveDataProvider;

class UserProfileController extends Controller
{

    public $layout = "user";
    public function actionIndex()
    {
        
        $user_id = Yii::$app->user->getId();       
    	$model = "";
    	if($user_id){
	    	 $model = Profile::findOne(['user_id' => $user_id]);
    	}
        
        $sql = 'SELECT id , name  FROM states where country_id=101';
        $states = States::findBySql($sql)->all();       
        $listData=ArrayHelper::map($states,'id','name');
       
        
        $citArray = array();
        if($model->getAttribute('state')!='')
        {
            $sql = 'SELECT id , name  FROM cities where state_id='.$model->getAttribute('state');
            $cities = Cities::findBySql($sql)->all();
            $citArray=ArrayHelper::map($cities,'id','name');
                       
        }
        //print_r($user_id);exit;
        $sql = 'SELECT id , name  FROM category';
        $categories = Category::findBySql($sql)->all();       
        $categoriesData=ArrayHelper::map($categories,'id','name');
        
        //print_r($model);
        
         if ($model->load(Yii::$app->request->post())) {
             $model->validate();
             $slug = $model->profile_slug;
             $profileID = Yii::$app->user->getId();
             $model->saveProfile(Yii::$app->request->post(),$profileID,$slug);
            
             $this->redirect('/user-profile/photo-gallery/');
            // form inputs are valid, do something henetworkidre
            //return;
        }
          
        
    

    return $this->render('index', [
        'model' => $model,
        'states'=>$listData,
         'cities'=>$citArray,
        'categoriesData'=>$categoriesData
    ]);
    }
    
    
    public function actionPhotoGallery()
    {
        $user_id = Yii::$app->user->getId();
        
       	$model = "";
    	if($user_id){
	    	 $model = new PhotoGallery();
                 $photoImages = PhotoGallery::getImagePathByProfileID($user_id,'thumb');
                 $dataProvider = new ActiveDataProvider([
                    'query' => PhotoGallery::find()->where(['user_id' => $user_id]),
                     ]);
    	}
        
        
        if ($model->load(Yii::$app->request->post())){
            $image = UploadedFile::getInstance($model, 'path');
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,$model->load(Yii::$app->request->post()));
                    if($img_res==true)
                    {
                                         
                        
                    }
                    $dataProvider = new ActiveDataProvider([
                    'query' => PhotoGallery::find()->where(['user_id' => $user_id]),
                     ]);
                }
                                
            }
            
         return $this->render('photo-gallery',['model' => $model,'user_id'=>$user_id,'photoImages'=>$photoImages,'dataProvider'=>$dataProvider]);
    }
    
    public function actionGetCities()
    {
        
        if(Yii::$app->request->post('sid'))
         {
            $sql = 'SELECT id , name  FROM cities where state_id='.Yii::$app->request->post('sid');
           
            $cities = Cities::findBySql($sql)->all();
            $listData=ArrayHelper::map($cities,'id','name');
            //print_r($listData);
            $listArray = '';
            if(count($listData>0))
            {
               foreach($listData as $key => $value){
             			$listArray .="<option value='".$key."'>".$value."</option>";
             		} 
            }
            print_r($listArray);
         }
    }
    
    public function actionHome()
    {
        return $this->render('home');
    }
     public function actionSettings()
    {
         $user_id = Yii::$app->user->getId();
       	$model = "";
    	if($user_id){
	    	 $model = new Links();
                 
    	}
        
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
            unset($_POST);
            $this->redirect("/user-profile/settings/");
        } 
        return $this->render('settings',['model' => $model,'user_id'=>$user_id]);
    }
     public function actionBanner()
    {
        
        $user_id = Yii::$app->user->getId();
       	$model = "";
    	if($user_id){
	    	 $model = new Banner();
                 $bannerImages = Banner::getBannerPathByProfileID($user_id);
    	}      
        
        if ($model->load(Yii::$app->request->post())){
            $image = UploadedFile::getInstance($model, 'path');
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,$model->load(Yii::$app->request->post()));
                    if($img_res==true)
                    {
                                         
                        
                    }
                }
                                
            }
            
         return $this->render('banner',['model' => $model,'user_id'=>$user_id,'bannerImages'=>$bannerImages]);
    }
    
    public function actionProfileImage()
    {
        $user_id = Yii::$app->user->getId();
       	$model = "";
    	if($user_id){
	    	 $model = new Profileimage();
                 $profileImages = Profileimage::getProfileimagePathByProfileID($user_id,'thumb');
    	}      
        
        if ($model->load(Yii::$app->request->post())){
            $image = UploadedFile::getInstance($model, 'path');
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,$model->load(Yii::$app->request->post()));
                    if($img_res==true)
                    {
                                         
                        
                    }
                }
                                
            }
        
        
       return $this->render('profile-image',['model' => $model,'user_id'=>$user_id,'profileImages'=>$profileImages]); 
    }
    
    
    public function actionStaff()
    {
        
        $user_id = Yii::$app->user->getId();
       	$model = "";
    	if($user_id){
	    	 $model = new StaffGallery();
                 $staffImages = StaffGallery::getImagePathByProfileID($user_id,'thumb');
    	}
        
        
        if ($model->load(Yii::$app->request->post())){
            $image = UploadedFile::getInstance($model, 'path');
            
            if (isset($image) && !empty($image)) {
                
                $img_res = $model->saveImages($user_id, $image,$model->load(Yii::$app->request->post()));
                    if($img_res==true)
                    {
                                         
                        
                    }
                }
                                
            }
            
         return $this->render('staff',['model' => $model,'user_id'=>$user_id,'staffImages'=>$staffImages]);
        
    }
}
?>