<?php

namespace app\models\user;

use Yii;

/**
 * 用户注册场景模型
 * Class UserRegisterModel
 * @package app\models\user
 */
class UserRegisterModel extends UserModel
{

    public $password2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],

            ['username', 'string', 'length' => [1, 30]],
            ['username', 'unique', 'message' => '该用户名已注册'],

            ['password', 'string', 'length' => [6, 60]],
            ['password', 'compare', 'compareAttribute' => 'password2', 'on' => 'register'],

            [['email'], 'email'],
            [['phone'], 'number'],

            [['username', 'email', 'phone', 'address'], 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'password2' => '确认密码',
            'email' => '邮箱',
            'phone' => '手机',
            'address' => '地址',
        ];
    }
}
