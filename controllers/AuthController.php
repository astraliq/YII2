<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\Users;
use yii\web\Controller;

class AuthController extends BaseController
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->auth = \Yii::$app->auth;
    }

    private $auth;

    public function actionSignUp(){
        $model = new Users();

        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());

            if ($this->auth->signUp($model)) {
                return $this->redirect(['/auth/sign-in']);
            }

        }


        return $this->render('signup',['model'=>$model]);
    }

    public function actionSignIn(){
        $model = new Users();

        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());

            if ($this->auth->signIn($model)) {
                return $this->redirect(['/activity/view-all']);
            }

        }


        return $this->render('signin',['model'=>$model]);
    }
}