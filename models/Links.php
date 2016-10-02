<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $link
 * @property string $tittle
 * @property string $desc
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'link', 'tittle'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['tittle', 'desc'], 'string', 'max' => 255],
            [['link', ], 'url'],
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
            'link' => 'Link',
            'tittle' => 'Tittle',
            'desc' => 'Desc',
        ];
    }
    
    public function getAllLinksbyUserID($profileID)
    {
            $connection = \Yii::$app->db;
             $data = $connection->createCommand("SELECT * from links where user_id='".$profileID."'");
             $data = $data->queryAll();
             return $data;
    }
}
