<?php


namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\console\Application;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface $mailer */
    private $mailer;

    public function getMailer() {
        return $this->mailer;
    }

    public function init()
    {
        parent::init();
        $this->mailer = \Yii::$app->mailer;
    }

    /**
     * @param Activity[] $activities
     * @return bool
     */
    public function sendNotifications(array $activities)
    {
        foreach ($activities as $activity) {
            $send = $this->getMailer()->compose('notif',['model' => $activity])
                ->setSubject('События сегодня!')
                ->setFrom('astral457@mail.ru')
                ->setTo($activity->email)
                ->send();
            if (!$send) {
                if (\Yii::$app instanceof Application) {
                    echo 'Error send email to '.$activity->email. '!'.PHP_EOL;
                }
                return false;
            }

            if (\Yii::$app instanceof Application) {
                echo 'Email send to '.$activity->email. '!'.PHP_EOL;
            }

            return true;
        }
    }
}