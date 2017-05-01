<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @property string  $profile_slug
 */
namespace app\models;

use Yii;
use dektrium\user\models\Profile as BaseProfile;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property string  #description
 * @property string  $mobile
 * @property string  $address
 * @property string  $state
 * @property string  $city
 * @property string  $zipcode
 * @property string  $category
 * @property string  $profile_slug
 * 
 */

class Profile extends BaseProfile
{
    
    
    
    public function rules()
    {        
         $rules = parent::rules();
        
         $rules[]=[['name','public_email','description','mobile','address','state','city','zipcode','category'],'required','on'=>"update_profile"];
         $rules[]=['mobile', 'match', 'not' => false,
            'pattern' => '/^[0-9]{10}$/',
            'message' => 'Mobile Number should be 10 Numeric Characters.'
           
        ];
         $rules[]=['profile_slug', 'match', 'not' => false,
            'pattern' => '/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'message' => 'Alphabets, numbers and hypen(-) is allowed. Slug Can be created like this  e.g contact-us about-us govt-senior-school','on'=>'update_slug'
           
        ];
         
         $rules[]=['profile_slug', 'unique', 'message' => 'Profile Slug already taken. Try with some other.','on'=>'update_slug'];
          
         
         $rules[]=[['profile_slug'],'required','on'=>'update_slug'];
         $rules[]=['profile_slug','safe'];
         return $rules;
         
    }
    
   
     public function attributeLabels() {
        $attLabels = parent::attributeLabels();
        $attLabels['description']= "Small Description";
        $attLabels['mobile']= "Mobile Number";
        $attLabels['address']= "Address";
        $attLabels['state']= "State";
        $attLabels['city']= "City";
        $attLabels['zipcode']= "Zip Code/ Postal Code";
        $attLabels['category']= "Category";
        $attLabels['profile_slug']= "";
        return $attLabels;
        }
    
        
        
        public function saveProfile($post_data,$profileID,$slug){  
            
           if(!empty($slug) &&  ($this->ifProfileSlugExists($profileID)===false))
           {
               
                     $res_count = \Yii::$app->db->createCommand()->update('profile', [
                    'name' => $post_data['Profile']['name'],
                    'public_email' => $post_data['Profile']['public_email'],
                    'mobile' => $post_data['Profile']['mobile'],
                    'website' => $post_data['Profile']['website'],                  
                    'address' => $post_data['Profile']['address'],
                    'state' => $post_data['Profile']['state'],
                    'city' => $post_data['Profile']['city'],
                    'zipcode' => $post_data['Profile']['zipcode'],
                     'category'=>$post_data['Profile']['category'],
                    'description' => $post_data['Profile']['description'],
                    ], 'user_id =' . $profileID . '')->execute();
           }
            else {


                                $res_count = \Yii::$app->db->createCommand()->update('profile', [
                               'name' => $post_data['Profile']['name'],
                               'public_email' => $post_data['Profile']['public_email'],
                               'mobile' => $post_data['Profile']['mobile'],
                               'website' => $post_data['Profile']['website'],                  
                               'address' => $post_data['Profile']['address'],
                               'state' => $post_data['Profile']['state'],
                               'city' => $post_data['Profile']['city'],
                               'zipcode' => $post_data['Profile']['zipcode'],
                                'category'=>$post_data['Profile']['category'],
                               'description' => $post_data['Profile']['description']], 'user_id =' . $profileID . '')->execute();
            }
            return $res_count;
        }
        
        
        public function getProfileDetails($profileID)
    {
            $connection = \Yii::$app->db;
        $data = $connection->createCommand("SELECT  * from profile as p where p.user_id =$profileID");
    	$data = $data->queryOne();
        return $data ;
        
    }
    
     public function getProfileIDBySlug($profile_slug)
    {
       
         $connection = \Yii::$app->db;
        $data = $connection->createCommand("SELECT user_id from profile as p where p.profile_slug ='$profile_slug'");
    	$data = $data->queryOne();
        
        return $data['user_id'] ;
        
    }
    
    static public function profileSlugify($text)
    {
            // replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);

            // transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            // trim
            $text = trim($text, '-');

            // remove duplicate -
            $text = preg_replace('~-+~', '-', $text);

            // lowercase
            $text = strtolower($text);

            if (empty($text)) {
              return 'n-a';
            }

        return $text;
        }
        
         public function ifProfileSlugExists($profileID)
        {
            $connection = \Yii::$app->db;
            $data = $connection->createCommand("SELECT profile_slug from profile as p where p.user_id ='$profileID'");
            $data = $data->queryOne();
            if(isset($data['profile_slug'])&& !empty($data['profile_slug']))
            {
                return true;
            }
            return false ;
        }
    
     public function behaviors() 
    {
        return [
	               
                    ['class' => SluggableBehavior::className(), 
                        'attribute'=> 'name',
                        'slugAttribute' => 'profile_slug',
                        'immutable' => true,
                        'ensureUnique'=>true,
                    ]
            ];
    
	}
        
    public function customSearch($q)
{
        
    $connection = \Yii::$app->db;
    $data = $connection->createCommand("select * from profile where match(name,description,address) against ('".$q."' in boolean mode)");
	$data = $data->queryAll();             
    
    $profiledata = $connection->createCommand("select id,category_slug from category");
	$profiledata = $profiledata->queryAll();
    $pdata = array();
    foreach($profiledata as $pkey=>$pvalue)
    {
        $pdata[$pvalue['id']]= $pvalue['category_slug'];
    }
    $returnData = array();
    
    if(count($data)>0)
    {
        foreach($data as $key=>$value)
        {
            if(array_key_exists($value['category'], $pdata))
            {
                
               $value['category_slug']=$pdata[$value['category']];
                
            }
         $returnData[]=$value;  
        }
    }        
    return $returnData;
}
      

 public function saveProfileSlug($post_data){  
            
           
                     $res_count = \Yii::$app->db->createCommand()->update('profile', [
                   
                    'profile_slug' => $post_data['Profile']['profile_slug'],
                    ], 'user_id =' . $post_data['Profile']['user_id'] . '')->execute();
          
            return $res_count;
        }
        
       
     
}
