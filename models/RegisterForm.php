<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $name;
    public $surname;
    public $patronymic;

    public $password_repeat;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'name', 'surname', 'email'], 'required'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Логин уже занят'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Почта уже занята'],
            ['patronymic', 'string'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'string'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->HashPassword($this->password);

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'password_repeat' => 'Повторите пароль',
            'username' => 'Логин',
            'email' => 'Почта',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчетство',
            'password' => 'Пароль',
        ];
    }

}
