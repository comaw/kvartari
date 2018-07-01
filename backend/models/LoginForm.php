<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 01.07.2018
 * Time: 12:02
 */

namespace backend\models;

use common\models\Admin;
use Yii;

/**
 * Class LoginForm
 * @package backend\models
 */
class LoginForm extends \common\models\LoginForm
{
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'rememberMe' => Yii::t('app', 'Запомнить меня'),
        ];
    }

    /**
     * Finds user by [[username]]
     *
     * @return Admin|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }
}
