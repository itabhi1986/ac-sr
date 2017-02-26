<?php

namespace app\models;

use Yii;
use dosamigos\fileupload\FileUpload;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\db\Query;
use yii\helpers\Json;
use Imagine\Image\Point;

/**
 * This is the model class for table "profileimage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $path
 * @property string $name
 * @property string $heading
 * @property string $desc
 */
class Profileimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $profileImage;
    public $crop_info;
    
    public static function tableName()
    {
        return 'profileimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'path'], 'required'],
            [['user_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100],
            [['heading'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'path' => 'Path',
            'name' => 'Name',
            'heading' => 'Heading',
            'desc' => 'Description',
        ];
    }
    
     public function saveImages($profile_id,$image,$data,$crop_info=NULL){
     
     
     $this->profileImage = $image;

        foreach ($this->profileImage as $file) {
            $profile_images_path = \Yii::getAlias('@webroot') . "/uploads/" . $profile_id . "/profile-image";

            if (!is_dir($profile_images_path)) {
                mkdir($profile_images_path, 0777, true);
                chmod($profile_images_path,0777);
            }
                        
            
            }
            $fileName =  str_replace(' ', '_', strtotime(date("Y-m-d h:i:s")).'-'.$this->profileImage->baseName) . '.' . $this->profileImage->extension;
            $filePath = $profile_images_path . '/' . $fileName;
            $this->profileImage->saveAs($filePath);
            $this->profileImage = null;
            $image = Image::getImagine()->open($filePath);
            $cropInfo = Json::decode($crop_info)[0];
            if(isset($cropInfo['dw'],$cropInfo['dh'],$cropInfo['x'],$cropInfo['y']))
            {
            $cropInfo['dw'] = (int)$cropInfo['dw']; //new width image
            $cropInfo['dh'] = (int)$cropInfo['dh']; //new height image
            $cropInfo['x'] = abs($cropInfo['x']); //begin position of frame crop by X
            $cropInfo['y'] = abs($cropInfo['y']);
            
            
            $newSizeThumb = new Box($cropInfo['dw'], $cropInfo['dh']);
            $cropSizeThumb = new Box(307, 336); //frame size of crop
            $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
            
           
            $image->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($filePath, ['quality' => 100]);
            }
            chmod($filePath,0777);
            Image::getImagine()->open($filePath)->thumbnail(new Box(307, 336))->save($profile_images_path. '/thumb-'.$fileName , ['quality' => 90]);
            chmod($profile_images_path. '/thumb-'.$fileName,0777);
           
            /*$res = \Yii::$app->db->createCommand()->insert('profileimage', [
                        'user_id' => $profile_id,
                        'name' => $data['name'],
                        'path' => $fileName,
                        'heading' => $data['heading'],
                        'desc' => $data['desc'],
                        
                    ])->execute();*/

        return $fileName;
        }
        
         public function getProfileimagePathByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path from profileimage where user_id='".$profileID."'");
             $data = $data->queryAll();
             $imageArray = [];
             foreach($data as $key=>$value)
             {
                 $imageArray[]=$profile_images_path.$value['path'];
             }
             return $imageArray;
            
        }
        
        
        
        public function getProfileimagedetailsByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/profile-image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT * from profileimage where user_id='".$profileID."' order by id desc limit 1");
             $data = $data->queryAll();
             
             $imageArray = [];
             foreach($data as $key=>$value)
             {
                 foreach($value as $k =>$v)
                 {
                     if($k=="path")
                     {
                        $imageArray[$key][$k]=$profile_images_path.$v;
                     }
                     else
                     {
                         $imageArray[$key][$k]=$v;
                     }
                 }
             }
             return $imageArray;
            
        }
}
