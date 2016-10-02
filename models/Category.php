<?php

namespace app\models;

use Yii;
use app\models\Profile;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property sting $category_slug;
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 125],
            [['name'], 'unique'],
            [['category_slug'], 'string','max'=>255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    
    public function getAllCategories()
    {
        $model = Category::find()->all();
        $category = array();
        foreach($model as $key=>$value)
        {
            $category[$value['category_slug']] = $value['name'];
                     
        }
        
        return $category;
    }
    
    public function getCategoryIDbySlug($slug)
    {
        $connection = \Yii::$app->db;
    	$data = $connection->createCommand("SELECT  id from category as c where c.category_slug='".$slug."'");
    	$data = $data->queryOne();
        return $data['id'];
    }
    
    public function getAllprofileOfCategory($category)
    {
        $categoryID = Category::getCategoryIDbySlug($category);
        $connection = \Yii::$app->db;
    	$data = $connection->createCommand("SELECT  * from category as c join profile as p on c.id = p.category where c.id =$categoryID");
    	$data = $data->queryAll();
        return $data ;
    }
    
    
     public function behaviors() 
    {
        return [
	               
            ['class' => SluggableBehavior::className(),
            'attribute' => 'name',
            'slugAttribute' => 'category_slug',
           // 'immutable' => true,
            'ensureUnique'=>true,
            ]
            ] ;
    
	}
    
}
