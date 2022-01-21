<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{

    public function getRawData()
    {
        $raw = $this->request->getRawBody();
        $raw = json_decode($raw, true);
        return $raw;
    }

    public function jsonSuccess($data = [], $msg = 'ok')
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->response->data = ['code' => 0, 'msg' => $msg, 'data' => $data];
        \Yii::$app->end();
    }

    public function jsonError($code = -1, $msg = 'error')
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->response->data = ['code' => $code, 'msg' => $msg, 'data' => []];
        \Yii::$app->end();
    }

}
