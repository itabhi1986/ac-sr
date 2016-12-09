<?php

namespace app\models;

use Yii;
use dosamigos\fileupload\FileUpload;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\db\Query;

/**
 * This is the model class for table "staff_gallery".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $path
 * @property string $name
 * @property string $sub_tittle
 */
class StaffGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $image;
    public static function tableName()
    {
        return 'staff_gallery';
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
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
    
   public function saveImages($profile_id,$image,$data){
     
     
     $this->image = $image;

        foreach ($this->image as $file) {
            $profile_images_path = \Yii::getAlias('@webroot') . "/uploads/" . $profile_id . "/staff_image";

            if (!is_dir($profile_images_path)) {
                mkdir($profile_images_path, 0777, true);
            }
                        
            
            }
            $fileName =  str_replace(' ', '_', strtotime(date("Y-m-d h:i:s")).'-'.$this->image->baseName) . '.' . $this->image->extension;
            $filePath = $profile_images_path . '/' . $fileName;
            $this->image->saveAs($filePath);
            
            Image::getImagine()->open($filePath)->thumbnail(new Box(220, 220))->save($profile_images_path. '/thumb-'.$fileName , ['quality' => 90]);
            Image::getImagine()->open($filePath)->thumbnail(new Box(500, 500))->save($profile_images_path. '/medium-'.$fileName , ['quality' => 90]);
           
            $res = \Yii::$app->db->createCommand()->insert('staff_gallery', [
                        'user_id' => $profile_id,
                        'name' => $data['name'],
                        'path' => $fileName,
                        'sub_tittle' => $data['sub_tittle']
                    ])->execute();

        return true;
        }

        
    public function getImagePathByProfileID($profileID,$size=NULL)
        {
             if($size!=NULL)
             {
                 
                 if($size=="thumb")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/staff_image/thumb-";
                 }
                 if($size=="medium")
                 {
                 $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/staff_image/medium-";
                 }
                 
             }
            else{
                $profile_images_path = Yii::$app->homeUrl . "uploads/" . $profileID . "/staff_image/";
            }
        
             //print_r($profile_images_path);exit;
             $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT path from staff_gallery where user_id='".$profileID."'");
             $data = $data->queryAll();
             $imageArray = [];
             foreach($data as $key=>$value)
             {
                 $imageArray[]=$profile_images_path.$value['path'];
             }
             return $imageArray;
            
        }
}