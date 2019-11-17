<?php


namespace app\components;


use yii\base\Component;
use yii\db\Connection;

class DAOComponent extends Component
{
    private function getConnection(): Connection
    {
        return \Yii::$app->db;
    }
}