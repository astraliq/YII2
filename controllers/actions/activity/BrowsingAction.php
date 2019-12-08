<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\components\DayComponent;
use app\models\Activity;
use app\models\ActivitySearch;
use app\models\Day;
use yii\base\Action;
use yii\bootstrap\ActiveForm;
use yii\web\HttpException;
use yii\web\Response;

class BrowsingAction extends Action
{
    public function run()
    {
        $admin = false;
        if (!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException(403,'Not Auth Action');
        }

        $model = new ActivitySearch();
        $provider = $model->search(\Yii::$app->request->getQueryParams());

        if (\Yii::$app->rbac->canViewAll()){
            $admin = true;
            $activity = Activity::find()->all();
        } else {
            $activity = Activity::find()
                ->where(['userId' => \Yii::$app->user->getId(),'deleted' => 0])
                ->orderBy('id')
                ->all();
        }

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format=Response::FORMAT_JSON;
            return $activity;
        }

        return $this->controller->render('browsing', [
                'activity' => $activity,
                'model' => $model,
                'provider' => $provider,
                'admin'=>$admin,
            ]);
    }
}