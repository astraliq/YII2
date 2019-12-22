<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\Activity;
use app\models\Users;
use yii\web\Response;

class ApiController extends BaseController
{
    public function actionAuth () {
        if (\Yii::$app->user->isGuest){
            return 'Not auth action';
        }
        $userToken = \Yii::$app->user->identity->token;
        $userId = \Yii::$app->user->getId();
//        $userEmail = \Yii::$app->user->identity->username;
        \Yii::$app->response->format=Response::FORMAT_JSON;
        return [$userToken,$userId];
    }
}