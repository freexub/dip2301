<?php
namespace app\models;

use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class Signup extends \mdm\admin\models\form\Signup
{
    public $username;
    public $email;
    public $password;
    public $retypePassword;


    public function attributeLabels()
    {
        return [
            'username' => 'Логин пользователя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'retypePassword' => 'Подтвердить пароль',
        ];
    }
}
