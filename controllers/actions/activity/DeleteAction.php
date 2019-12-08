<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;
use yii\web\HttpException;
use yii\web\Response;

class DeleteAction extends Action
{
    public function run($id)
    {
        $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
        $model = Activity::findOne($id);
        $action = $this->controller->action->id;

        if (!$model){
            throw new HttpException(404,'Activity not found');
        }

        if (!\Yii::$app->rbac->canViewActivity($model)){
            throw new HttpException(403,'Not access to activity');
        }

        if ($model->deleted === 1 && $action === 'del') {
            throw new HttpException(404,'Activity has been deleted');
        }

        if ($model->deleted === 0 && $action === 'restore') {
            throw new HttpException(403, 'Activity is already restored');
        }

        if ($action === 'restore') {
            $pageTitle = 'Событие успешно восстановлено';
            if ($comp->restoreActivity($model)) {
                return $this->controller->render('deleted', ['pageTitle'=>$pageTitle]);
            } else {
                print_r($model->getErrors());
            }

        } elseif ($action === 'del') {
            $pageTitle = 'Событие успешно удалено';
            if ($comp->deleteActivity($model)) {
                return $this->controller->render('deleted', ['pageTitle'=>$pageTitle]);
            } else {
                print_r($model->getErrors());
            }
        }

        return $this->controller->render('index');
    }
}