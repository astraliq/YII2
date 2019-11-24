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

        if (!\Yii::$app->rbac->canViewActivity($model->userId)){
            throw new HttpException(403,'Not access');
        }

        return $this->controller->render('view', ['model' => $model,'pageTitle'=>'Просмотр события']);
    }
}