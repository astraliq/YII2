<?php


namespace app\base;




use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        //todod
        return parent::beforeAction($action);
    }
    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }
}