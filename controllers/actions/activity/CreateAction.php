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
    public function run()
    {
        if (!\Yii::$app->rbac->canCreateActivity()){
            throw new HttpException(403,'Not Auth Action');
        }

        $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
        $dayComp = \Yii::createObject(['class' => DayComponent::class,'modelClass' => Day::class]);
        $model = $comp->getModel();
        $dayModel = $dayComp->getModel();

//        \Yii::$app->session->set('sdf','val');

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            \Yii::$app->params['dateStart'] = \Yii::$app->formatter->asDatetime($model->dateStart, "php:M Y");
            if ($comp->addActivity($model) && $dayComp->addActivity($model, $dayModel)) {
                return $this->controller->render('view', ['model' => $model,'pageTitle'=>'Событие создано']);
            } else {
                print_r($model->getErrors());
            }
        }
        return $this->controller->render('create', ['model' => $model,]);
    }
}