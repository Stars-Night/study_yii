<?php

namespace app\controllers\user;

use Yii;
use app\controllers\BaseController;
use app\models\user\UserLoginModel;
use app\models\user\UserRegisterModel;
use app\services\user\UserService;

class UserController extends BaseController
{

    public $enableCsrfValidation = false; // 此控制器禁用csrf验证

    /**
     * 注册账号
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserRegisterModel();
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * 新建用户
     */
    public function actionAddUser()
    {
        $registerModel = new UserRegisterModel();
        $registerModel->load($this->request->post());
        if (!$registerModel->validate()) {
            $msg = reset($registerModel->firstErrors);
            return $this->jsonError('-1', $msg);
        }

        $service = new UserService();
        $ret = $service->createUser($registerModel);
        if (!$ret) {
            return $this->jsonError('-1', '保存失败');
        }
        return $this->jsonSuccess();
    }

    /**
     * 登录账号
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserLoginModel();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $service = new UserService();
            $ret = $service->login($model);
            if ($ret) {
                // 登录成功返回之前页面
                return $this->goBack();
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * 登出账号
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
