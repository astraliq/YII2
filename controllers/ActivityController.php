<?php


namespace app\controllers;


use actions\activity\CreateAction;
use app\base\BaseController;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create'=>['class'=>CreateAction::class,]
        ];

    }
//    public function actionCreate()
//    {
//        return $this->render('create');
//    }

}