<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\components\DayComponent;
use app\models\Activity;
use app\models\Day;
use yii\base\Action;
use yii\bootstrap\ActiveForm;
use yii\web\HttpException;
use yii\web\Response;

class BrowsingAction extends Action
{
    public function run()
    {
        $activity = Activity::find()
            ->where(['userId' => \Yii::$app->user->getId()])
            ->orderBy('id')
            ->all();

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format=Response::FORMAT_JSON;
            return $activity;
        }

        return $this->controller->render('browsing', ['activity' => $activity]);
    }
}