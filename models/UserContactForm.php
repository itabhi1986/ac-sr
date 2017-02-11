<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_contact_form".
 *
 * @property integer $if
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
            [['if', 'name', 'phone', 'email', 'message'], 'required'],
            [['if', 'user_id'], 'integer'],
            [['name', 'phone', 'email', 'message'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'if' => 'If',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'message' => 'Message',
        ];
    }
}
