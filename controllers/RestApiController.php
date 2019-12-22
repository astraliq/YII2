<?php


namespace app\controllers;


use app\models\Activity;
use app\models\Users;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class RestApiController extends ActiveController
{
    public $modelClass = Activity::class;

    public function behaviors()
    {
        $beh = parent::behaviors();
        $beh['authenticator']=[
            'class'=>HttpBearerAuth::class,
        ];
        return $beh;
    }

    public function actionUser ($token) {
        $user = Users::findIdentityByAccessToken($token);
        \Yii::$app->response->format=Response::FORMAT_JSON;
        return $user;
    }
}