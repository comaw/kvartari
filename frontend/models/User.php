<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 14:26
 */

namespace frontend\models;

use Yii;

class User extends \common\models\User
{
    public $password;
    public $confirm;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Full name'),
            'phone' => Yii::t('app', 'Phone'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'confirm' => Yii::t('app', 'Confirm password'),
            'verifyCode' => Yii::t('app', ''),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' =>  Yii::t('app','This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'message' =>  Yii::t('app','This email address has already been taken.')],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'unique', 'message' =>  Yii::t('app','This phone has already been taken.')],
            ['phone', 'match', 'pattern' => "/^\+([0-9]{1})\([0-9]{3}\)([0-9]{3})\-([0-9]{2})\-([0-9]{2})$/Ui", 'message' =>  Yii::t('app','Phone has incorrect format')],

            ['password', 'string', 'min' => 6, 'max' => 100],

            [['confirm'], 'compare', 'compareAttribute'=> 'password', 'message'=> Yii::t('app', 'Passwords do not match')],
        ];
    }
}
