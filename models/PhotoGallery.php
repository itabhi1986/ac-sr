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
 * This is the model class for table "photo_gallery".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $path
 * @property string $name
 * @property string $sub_tittle
 */
class PhotoGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $image;
    public $crop_info;
    public static function tableName()
    {
        return 'photo_gallery';
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
            [['name', 'sub_tittle'], 'string', 'max' => 100],
           // [['image'], 'file', 'extensions'=>'jpg, gif, png'],
             ['image', 'image', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
                ],
            ['crop_info', 'safe'],
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
            'sub_tittle' => 'Sub Tittle',
        ];
    }
    
   public function saveImages($profile_id,$image,$data,$crop_info=null){
     
     
     $this->image = $image;

        foreach ($this->image as $file) {
            $profile_images_path = \Yii::getAlias('@webroot') . "/uploads/" . $profile_id . "/gallery_image";

            if (!is_dir($profile_images_path)) {
                mkdir($profile_images_path, 0777, true);
            }
                        
            
            }
            $fileName =  str_replace(' ', '_', strtotime(date("Y-m-d h:i:s")).'-'.$this->image->baseName) . '.' . $this->image->extension;
            $filePath = $profile_images_path . '/' . $fileName;
            $this->image->saveAs($filePath);
             $this->image = null;
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
            
            
            Image::thumbnail($filePath ,307, 336)->save($profile_images_path. '/thumb-'.$fileName , ['quality' => 90]);
            Image::thumbnail($filePath ,375, 500)->save($profile_images_path. '/medium-'.$fileName , ['quality' => 90]);
           
            /*$res = \Yii::$app->db->createCommand()->insert('photo_gallery', [
                        'user_id' => $profile_id,
                        'name' => $data['name'],
                        'path' => $fileName,
                        'sub_tittle' => $data['sub_tittle']
                    ])->execute();*/

        return $fileName;
        }

        
    public function getImagePathByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path from photo_gallery where user_id='".$profileID."'");
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
             $data = $connection->createCommand("SELECT path,user_id from photo_gallery where id='".$profileID."'");
             $data = $data->queryOne();
             $profileID = $data['user_id'];
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/";
            }
        
             //print_r($profile_images_path);exit;
            
             
             return $profile_images_path.$data['path'];
           
            
        }
        
         public function getAllDetailsByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/gallery_image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path,name, sub_tittle  from photo_gallery where user_id='".$profileID."'");
             $data = $data->queryAll();
             $imageArray = [];
             foreach($data as $key=>$value)
             {
                  $imageArray[$key]['path']=$profile_images_path.$value['path'];
                 $imageArray[$key]['name']=$value['name'];
                 $imageArray[$key]['sub_tittle']=$value['sub_tittle'];
             }
             return $imageArray;
            
        }
}
