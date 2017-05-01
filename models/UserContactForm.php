<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_contact_form".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 */
class UserContactForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_contact_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name', 'phone', 'email', 'message'], 'required'],
            [['name', 'phone', 'email', 'message'], 'string', 'max' => 255],
            [['email'],'email'],
            [['phone'],'integer','message'=>"Phone Number should be 10 Digit Number only."],
            [[ 'phone'], 'string', 'length' => 10],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'message' => 'Message',
        ];
    }
}
