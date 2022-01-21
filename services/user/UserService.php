<?php

namespace app\services\user;

use Yii;
use app\models\user\UserModel;
use app\models\user\UserRegisterModel;
use app\models\user\UserLoginModel;
use app\services\BaseService;

class UserService extends BaseService
{

    public static $save_time = 3600;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function createUser(UserRegisterModel $registerModel)
    {
        // 密码使用PHP的crypt方法加密，生成60个ASCII字符
        $registerModel->password = Yii::$app->getSecurity()->generatePasswordHash($registerModel->password);
        return $registerModel->save();
    }

    public function login(UserLoginModel $loginModel)
    {
        $where = [
            'username' => $loginModel->username,
        ];
        $userInfo = UserModel::find()
            ->where($where)
            ->asArray()
            ->one();
        if (empty($userInfo)) {
            return false;
        }

        $ret = $this->checkPassword($loginModel->password, $userInfo['password']);
        if ($ret) {
            // 使用user组件保存登录用户信息
            return Yii::$app->user->login($loginModel->getUser(), self::$save_time);
        }
        return false;
    }

    /**
     * @param $password 前端传过来的明文密码
     * @param $hash     待对比的数据库hash密码
     */
    public function checkPassword($password, $hash)
    {
        $ret =Yii::$app->getSecurity()->validatePassword($password, $hash);
        if ($ret) {
            return true;
        }
        return false;
    }

}
