<?php


namespace app\commands;


use yii\console\Controller;

class NotificationController extends Controller
{
    public function actionTest($name)
    {
        echo 'test action ' . $name.PHP_EOL;
    }

    public function actionSendTodayActivity()
    {

    }
}