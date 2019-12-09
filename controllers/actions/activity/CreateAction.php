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

class CreateAction extends Action
{
    public function run($id=null)
    {
        $action = $this->controller->action->id;
        if ( $action === 'change') {
            $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
            $model = Activity::findOne($id);
            $pageTitle = 'Редактирование события';
            $pageTitleFinal = 'Событие изменено';
        } elseif ($action === 'create') {
            $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
//        $dayComp = \Yii::createObject(['class' => DayComponent::class,'modelClass' => Day::class]);
            $model = $comp->getModel();
//        $dayModel = $dayComp->getModel();
            $pageTitle = 'Создание события';
            $pageTitleFinal = 'Событие создано';
        } else {
            $pageTitle = '';
            $pageTitleFinal = '';
        }
        if (!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException(403,'Not Auth Action');
        }

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            \Yii::$app->params['dateStart'] = \Yii::$app->formatter->asDatetime($model->dateStart, "php:M Y");
            if ($comp->addActivity($model)) {
                return $this->controller->render('view', ['model' => $model,'pageTitle'=>$pageTitleFinal,'admin'=>false]);
            } else {
                print_r($model->getErrors());
            }
        }
        return $this->controller->render('create', ['model' => $model,'pageTitle'=>$pageTitle]);
    }
}