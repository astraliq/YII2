<?php


namespace app\models;


use yii\data\ActiveDataProvider;

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
        return $provider;
    }
}