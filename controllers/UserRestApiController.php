<?php


namespace app\controllers;


use app\models\Activity;
use app\models\Users;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class UserRestApiController extends ActiveController
{
    public $modelClass = Users::class;

    public function behaviors()
    {
        $beh = parent::behaviors();
        $beh['authenticator']=[
            'class'=>HttpBearerAuth::class,
        ];
        return $beh;
    }

    public function actionUser ($token=null) {
        $user = Users::findIdentityByAccessToken($token);

        return $user;
    }

}