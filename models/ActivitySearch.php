<?php


namespace app\models;


use yii\data\ActiveDataProvider;
use yii\helpers\Html;

class ActivitySearch extends Activity
{
    public function search($params = []): ActiveDataProvider
    {
        if (\Yii::$app->rbac->canViewAll()){
            $query = Activity::find();
        } else {
            $query = Activity::find()
                ->where(['userId' => \Yii::$app->user->getId()])
                ->orderBy('id');
        }

        $provider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'dateStart'=> SORT_DESC,
                    ]
                ],
                "pagination" => [
                        'pageSize' => 10,
                    ]
            ]
        );
        $query->with('user');
        if (!empty($params['year']) & !empty($params['month']) & !empty($params['day'])) {
            $query->andFilterWhere(['dateStart'=>$params['year'].'-'.$params['month'].'-'.$params['day']]);
        } elseif (!empty($params['year']) & !empty($params['month'])) {
            $query->andWhere('YEAR(`dateStart`)= :year',['year'=>$params['year']]);
            $query->andWhere('MONTH(`dateStart`)= :month',['month'=>$params['month']]);
        } elseif (!empty($params['year'])) {
            $query->andWhere('YEAR(`dateStart`)= :year',['year'=>$params['year']]);
        }


        return $provider;
    }
}