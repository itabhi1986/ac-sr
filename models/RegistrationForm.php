<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use app\models\User;

class RegistrationForm extends BaseRegistrationForm {
     public $user;
     public $name;
     public $phone;
     public $profile_slug;
     public $mobile;
     
     

    public function init() {
        $this->user = \Yii::createObject([
                    'class' => User::className(),
                    'scenario' => 'register'
        ]);
       // $this->module = \Yii::$app->getModule('user');
    }  
    
     
    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
            'mobile' => $this->phone,
        ]);
        
        $user->setProfile($profile);
    }
    
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
        $rules[] =['phone','integer'];
        $rules[] =['phone','required'];
        return $rules;
    }
    
    public function register()
    {
       
        if(!$this->validate())
        {
            return false;
        }
        
         $this->user->setAttributes([
            'name'=>$this->name,
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'phone'=>$this->phone
         
        ],true);
         
         /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
       
        $profile->setAttributes([
             'name' =>$this->name,
            
        ]);
         
        $this->user->setProfile($profile);
         
         
        return $this->user->register();
    }
    
    
}