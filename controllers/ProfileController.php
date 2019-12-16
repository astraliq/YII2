<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\Users;
use yii\base\Response;
use yii\web\HttpException;

class ProfileController extends BaseController
{
    private $userId;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->userId = \Yii::$app->user->getId();
    }

    public function actionView(){

        if (\Yii::$app->user->isGuest){
            throw new HttpException(403,'Not access to this page, please auth');
        }

        $user = Users::findOne($this->userId);
        $admin = false;

        if (\Yii::$app->rbac->canViewAll()) {
            $admin = true;
        }

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format=Response::FORMAT_JSON;
            return $user;
        }

        return $this->render('view', ['user' => $user,'pageTitle'=>'Личный кабинет','admin'=>$admin]);
    }

    public function actionChange(){

        if (\Yii::$app->user->isGuest){
            throw new HttpException(403,'Not access to this page, please auth');
        }

        $user = Users::findOne($this->userId);
        $admin = false;

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format=Response::FORMAT_JSON;
            return $user;
        }

        return $this->render('change',['user' => $user,'pageTitle'=>'Личный кабинет','admin'=>$admin]);
    }
}