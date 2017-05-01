<?php

namespace app\models;

use Yii;
use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    
    public $name;
    
    public $mobile;
    
     public function register()
    {
		$res = parent::register();                
		return $res;
		
    }
    
}
