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

class GetAction extends Action
{
    public function run($id)
    {
        $model = Activity::findOne($id);

        if (!$model){
            throw new HttpException(404,'Activity not found');
        }

        if (!\Yii::$app->rbac->canViewActivity($model)){
            throw new HttpException(403,'Not access to activity');
        }

        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format=Response::FORMAT_JSON;
            return $model;
        }

        return $this->controller->render('view', ['model' => $model,'pageTitle'=>'Просмотр события']);
    }
}