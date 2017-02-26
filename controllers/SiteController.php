<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\modules\admin\models\Page;
use app\models\Category;
use yii\helpers\Url;
use app\models\Profile;
use app\models\Banner;
use app\models\Profileimage;
use app\models\ProfileSearch;
use app\models\UserContactForm;
use yii\web\Response;
use yii\bootstrap\ActiveForm;

class SiteController extends Controller {

    public $layout = "@app/views/layouts/withoutbanner";

    public function init() {
        parent::init();
        //print_r($this->actions());
        //$this->action = 'index';exit;	
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        $this->layout = "@app/views/layouts/home";
        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContactUs() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function ActionThankyou() {
        return $this->render("thankyou");
    }

    public function actionSearchProfile() {
        $profiles = array();
        if (Yii::$app->request->get()) {
            $postData = Yii::$app->request->get();
            $searchText = $postData['s'];            
            $profiles = ProfileSearch::customSearch($searchText);          
           
        }
        return $this->render("c-profile", [
                        'profiles' => $profiles,
                        'searchText'=>$searchText]);
    }

    public function actionCatgoriesSlug($slug_url) {
        $category = trim($slug_url);

        $profiles = Category::getAllprofileOfCategory($category);

        return $this->render("c-profile", [
                    'profiles' => $profiles]);
    }

    public function actionProfileSlug($slug_url, $profile_url) {
        $this->layout = "withoutbanner";
        $category = trim($slug_url);
        $profile = trim($profile_url);
        $profileID = Profile::getProfileIDBySlug($profile_url);

        $profileDetails = Profile::getProfileDetails($profileID);
        $bannerImages = Banner::getBannerPathByProfileID($profileID);
        //$bannerImages = Profileimage::getProfileimagePathByProfileID($profileID);  
            
        $model = new UserContactForm();
         if ($model->load(Yii::$app->request->post())) {
           
             if($model->validate())
             {
                  $model->save();
                  
                  \Yii::$app->mailer
                            ->compose('usercontact',['model'=>$model])
                            ->setFrom("abhishek.chauhan@redblink.com")
                            ->setTo("abhishek.it.1986@gmail.com")
                            ->setReplyTo(array("no-reply@search2city.com"))                           
                            ->setSubject("A user has contacted from the website")
                            ->send();
                 \Yii::$app->getSession()->setFlash('success', 'Email Sent successfully');
                 
                 unset($_POST);
                 
                $model = new UserContactForm();
                return $this->render(
                        "profile", [
                    'profile' => $profileDetails,
                    'bannerImages' => $bannerImages,
                     'model'=>$model
        ]);
                  
             }
             
                 
               
           
        } 
        
        return $this->render(
                        "profile", [
                    'profile' => $profileDetails,
                    'bannerImages' => $bannerImages,
                     'model'=>$model
        ]);
    }
    
    public function actionUsercontact()
    {
        $model = new UserContactForm();
         
        if (Yii::$app->request->isAjax) {
               $model->load($_POST);
                
                Yii::$app->response->format = Response::FORMAT_JSON;
                if($model->validate())
                {
                    
                   
                }
                else {
                    return ActiveForm::validate($model);
                }
                
            }
    }
    
    

}
