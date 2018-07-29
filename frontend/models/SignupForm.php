<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $phone;
    public $email;
    public $password;
    public $confirm;
    public $role;
    public $verifyCode;

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
            'role' => Yii::t('app', 'Role'),
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
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' =>  Yii::t('app','This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' =>  Yii::t('app','This email address has already been taken.')],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' =>  Yii::t('app','This phone has already been taken.')],
            ['phone', 'match', 'pattern' => "/^\+([0-9]{1})\([0-9]{3}\)([0-9]{3})\-([0-9]{2})\-([0-9]{2})$/Ui", 'message' =>  Yii::t('app','Phone has incorrect format')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'max' => 100],

            [['confirm'], 'compare', 'compareAttribute'=> 'password', 'message'=> Yii::t('app', 'Passwords do not match')],
            [['verifyCode'], \common\recaptcha\ReCaptchaValidator::class, 'secret' => \common\recaptcha\ReCaptcha::SECRET_KEY],

            [['username', 'email', 'phone'], 'filter', 'filter' => 'strip_tags'],

            ['role', 'required'],
            ['role', 'in', 'range' => array_keys(Users::listRoleForSignUp())],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
