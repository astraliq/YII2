<?php


namespace app\controllers;



use app\base\BaseController;
use app\controllers\actions\activity\CreateAction;
use app\controllers\actions\activity\GetAction;
use yii\web\ViewAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create'=>['class'=>CreateAction::class,],
            'view' => ['class' =>GetAction::class],
        ];

    }
//    public function actionCreate()
//    {
//        return $this->render('create');
//    }

}