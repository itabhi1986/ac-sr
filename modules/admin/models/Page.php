<?php

namespace app\modules\admin\models;

use dektrium\user\models\User;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * This is the model class for table "pages".
 *
 * @property string $page_id
 * @property string $page_name
 * @property string $page_content
 * @property string $page_status
 * @property string $slug
 * @property string $page_owner
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $show_breadcrumb
 * @property string $layout
 * @property string $sidebar
 * @property string $page_date_created
 * @property string $page_date_modified
 * @property string $page_type 
 * @property string $featured 
 * @property string $allow_comments 
 * @property string $featured_image 
 */
class Page extends \yii\db\ActiveRecord
{
	public $imageFile;
	public $webDir;// = "uploads/page";
	
	public function __construct($page_type = "page"){//die($page_type);
		parent::__construct();
		$this->page_type = $page_type;
		$this->webDir = "uploads/" . $page_type;
	}
	
	public function init()
	{
		parent::init(); // Call parent implementation;
	}
	public function behaviors()
	{
		return [
		[
		'class' => SluggableBehavior::className(),
		'attribute' => 'page_name',
		'immutable' => true,
		'ensureUnique'=>true,
		// 'slugAttribute' => 'slug',
		],
		];
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_content', 'meta_description', 'meta_keywords', 'layout', 'sidebar', 'featured'], 'string'],
            [['page_owner', 'show_breadcrumb'], 'integer'],
            [['page_name', 'page_content'], 'required'],
            [['page_date_created', 'page_date_modified'], 'safe'],
            [['page_name', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['page_status', 'allow_comments'], 'string', 'max' => 20],
            [['slug'], 'string', 'max' => 200],
            [['layout', 'sidebar'], 'string', 'max' => 50],
			[['page_type'], 'string', 'max' => 30],
            [['featured_image'], 'string', 'max' => 600]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'page_name' => 'Name',
            'page_content' => 'Content',
            'page_status' => 'Status',
            'slug' => 'Slug',
            'page_owner' => 'Owner',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'show_breadcrumb' => 'Show Breadcrumb',
            'layout' => 'Layout',
            'sidebar' => 'Sidebar',
            'page_date_created' => 'Page Date Created',
            'page_date_modified' => 'Page Date Modified',
            'page_type' => 'Page Type',
            'featured' => 'Featured',
            'allow_comments' => 'Allow Comments',
            'featured_image' => 'Featured Image',
            'imageFile' => 'Featured Image',
        ];
    }
    
    public function getSeoUrl(){
    	$url = "/" . $this->page_type . "/" . $this->slug;
    	return $url;
    }
    
    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)) {
    		
    		if(isset($_POST['delete-logo'])){
    			$this->deleteLogo();
    		}
    		
    		$this->imageFile = UploadedFile::getInstance($this, 'imageFile');//print_r($this->imageFile);exit;
    		if($this->imageFile && !$this->uploadLogo()){
    			return false;
    		}
    		
    		//Internal Variables
    		$this->page_owner = Yii::$app->user->identity->id;
    		$this->page_date_modified = date('Y-m-d H:i:s', time());
    		if(!isset($this->page_id)){
    			$this->page_date_created = date('Y-m-d H:i:s', time());;
    		}
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    public function uploadLogo()
    {
    	if ($this->validate()) {
    		//Delete Older logo before updaing the newer one.
    		$this->deleteLogo();
    
    		$rand = time() . "_" . rand(10, 99);
    		$imageFilePath = $this->webDir . '/' . $rand . '.' . $this->imageFile->extension;
    		$this->imageFile->saveAs($imageFilePath);
    		$this->featured_image = $imageFilePath;
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function deleteLogo(){
    	if($this->featured_image){
    		$logoPath = Yii::getAlias('@webroot') . "/" . $this->featured_image;
    		if(file_exists($logoPath)){
    			unlink($logoPath);
    
    			//set featured_image to blank
    			$this->featured_image = "";
    		}
    	}
    }
    
    public function getLogoUrl($size = "master", $returnDefault = true){
    	if($this->featured_image){
    		return "/" . $this->featured_image;
    	}
    	elseif ($returnDefault){
    		return "/uploads/events/default/event-default.png";
    	}
    	return false;
    }
    
    public function getOwner(){
    	if (($user = User::findOne('1')) !== null) {
    		return $user;
    	}
    	return 0;
    }

    
}
