<?php


namespace app\commands;


use yii\console\Controller;
use yii\helpers\Console;

class NotificationController extends Controller
{
    public function actionTest($name)
    {
        echo 'test action ' . $name.PHP_EOL;
    }

    public function actionSendTodayActivity()
    {
        $activities = \Yii::$app->activity->findTodayNotifActivity();

        echo Console::ansiFormat('Count activities: '. count($activities),[Console::FG_GREEN]).PHP_EOL;
    }
}