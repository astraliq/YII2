<?php


namespace app\controllers\actions\activity;


use app\components\ActivityComponent;
use app\components\DayComponent;
use app\models\Activity;
use app\models\Day;
use yii\base\Action;

class CreateAction extends Action
{
    public function run()
    {
        $comp = \Yii::createObject(['class' => ActivityComponent::class,'modelClass' => Activity::class]);
        $dayComp = \Yii::createObject(['class' => DayComponent::class,'modelClass' => Day::class]);
        $model = $comp->getModel();
        $dayModel = $dayComp->getModel();

//        \Yii::$app->session->set('sdf','val');

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if ($comp->addActivity($model) && $dayComp->addActivity($model, $dayModel)) {

            }
        }
        return $this->controller->render('create', ['model' => $model,]);
    }
}