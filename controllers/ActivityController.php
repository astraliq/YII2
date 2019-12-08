<?php


namespace app\controllers;



use app\base\BaseController;
use app\controllers\actions\activity\BrowsingAction;
use app\controllers\actions\activity\ChangeAction;
use app\controllers\actions\activity\CreateAction;
use app\controllers\actions\activity\DeleteAction;
use app\controllers\actions\activity\GetAction;
use yii\web\ViewAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create'=>['class'=>CreateAction::class,],
            'view' => ['class' =>GetAction::class],
            'view-all' => ['class' =>BrowsingAction::class],
            'change' => ['class' =>CreateAction::class],
            'del' => ['class' =>DeleteAction::class],
            'restore' => ['class' =>DeleteAction::class],
        ];

    }

}