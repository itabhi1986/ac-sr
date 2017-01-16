<?php

namespace app\models;

use Yii;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $path
 * @property string $name
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $bannerImage;
    public static function tableName()
    {
        return 'banner';
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
        ];
    }
    
     public function saveImages($profile_id,$image,$data){
     
     
     $this->bannerImage = $image;

        foreach ($this->bannerImage as $file) {
            $profile_images_path = \Yii::getAlias('@webroot') . "/uploads/" . $profile_id . "/banner-image";

            if (!is_dir($profile_images_path)) {
                mkdir($profile_images_path, 0777, true);
                chmod($profile_images_path,0777);
            }
                        
            
            }
            $fileName =  str_replace(' ', '_', strtotime(date("Y-m-d h:i:s")).'-'.$this->bannerImage->baseName) . '.' . $this->bannerImage->extension;
            $filePath = $profile_images_path . '/' . $fileName;
            $this->bannerImage->saveAs($filePath);
            chmod($filePath,0777);
            Image::getImagine()->open($filePath)->thumbnail(new Box(700, 220))->save($profile_images_path. '/thumb-'.$fileName , ['quality' => 90]);
            chmod($profile_images_path. '/thumb-'.$fileName,0777);
           
            /*$res = \Yii::$app->db->createCommand()->insert('banner', [
                        'user_id' => $profile_id,
                        'name' => $data['name'],
                        'path' => $fileName,
                        
                    ])->execute();*/

        return $fileName;
        }
        
         public function getBannerPathByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path from banner where user_id='".$profileID."'");
             $data = $data->queryAll();
             $imageArray = [];
             foreach($data as $key=>$value)
             {
                 $imageArray[]=$profile_images_path.$value['path'];
             }
             return $imageArray;
            
        }
        
        public function getImagePathByID($profileID, $size=NULL)
        {
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path from banner where user_id='".$profileID."'order by id desc ");
             $data = $data->queryOne();
             
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/banner-image/";
            }
        
             //print_r($profile_images_path);exit;
            
             
             return $profile_images_path.$data['path'];
           
            
        }
}
