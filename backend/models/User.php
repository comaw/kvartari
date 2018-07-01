<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $username
 * @property string $phone
 * @property string $role
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $pass
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Realty[] $realties
 */
class User extends \yii\db\ActiveRecord
{

    public $pass;

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->created_at = time();
            }
            $this->updated_at = time();

            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public static function listStatus(): array
    {
        return [
            10 => Yii::t('app', 'Active'),
            20 => Yii::t('app', 'Banned'),
        ];
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return isset(self::listStatus()[$this->status]) ? self::listStatus()[$this->status] : null;
    }

    /**
     * @return array
     */
    public static function listRole(): array
    {
        return [
            'tenant' => Yii::t('app', 'User'),
            'admin' => Yii::t('app', 'Admin'),
        ];
    }

    /**
     * @return string|null
     */
    public function getRole(){
        return isset(self::listRole()[$this->role]) ? self::listRole()[$this->role] : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'phone', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['pass'], 'string', 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'phone' => Yii::t('app', 'Phone'),
            'role' => Yii::t('app', 'Role'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'pass' => Yii::t('app', 'Password'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['user_id' => 'id']);
    }
}
