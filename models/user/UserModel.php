<?php

namespace app\models\user;

use Yii;
use app\models\BaseModel;

/**
 * 使用yii自带的user组件实现验证用户信息
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $create_time
 * @property string $update_time
 */
class UserModel extends BaseModel implements \yii\web\IdentityInterface
{

    private $_user = false;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'email' => '邮箱',
            'phone' => '手机',
            'address' => '地址',
        ];
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = self::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * 根据主键（id）获取用户
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * 根据access_token获取用户，用户表没有该字段，暂不实现
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        return static::findOne(['access_token' => $token]);
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
//        return $this->authKey;
        // 用户表没有该字段
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
//        return $this->authKey === $authKey;
        return true;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}
