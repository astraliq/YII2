<?php


namespace app\commands;


use app\components\NotificationComponent;
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

        if (count($activities)==0) {
            \Yii::$app->end(0);
        }

        /** @var NotificationComponent $notif */
        $notif= \Yii::createObject(NotificationComponent::class);

        echo Console::ansiFormat('Count activities: '. count($activities),[Console::FG_GREEN]).PHP_EOL;

        $notif->sendNotifications($activities);
    }
}