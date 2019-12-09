<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;

class FullDeleteAction extends Action
{
    public function run($id)
    {
        $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
        $model = Activity::findOne($id);

        if (!$model){
            throw new HttpException(404,'Activity not found');
        }

        if (!\Yii::$app->rbac->canViewActivity($model)){
            throw new HttpException(403,'Not access to activity');
        }

        $pageTitle = 'Событие полностью удалено';

        if ($comp->fullDeleteActivity($model)) {
            return $this->controller->render('fullDeleted', ['pageTitle'=>$pageTitle]);
        } else {
            print_r($model->getErrors());
        }

        return $this->controller->render('index');
    }
}