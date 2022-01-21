<?php

namespace app\models\user;

use Yii;
use app\models\user\User;

/**
 * 用户登录场景模型
 * Class UserRegisterModel
 * @package app\models\user
 */
class UserLoginModel extends UserModel
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'trim'],
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
        ];
    }

}
