<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $date;
    public $isBlocked;
    public $isRepeat;

    public function rules()
    {
        return [
            ['title','required'],
            ['description','string','max' => 250],
            ['date','string'],
            [['isBlocked','isRepeat'],'boolean']
        ];
    }
    public function attributeLabels()
    {
        return [
            'title'=>'Название события',
            'description'=>'Описание',
            'date'=>'Дата',
            'isBlocked'=>'Блокирующее',
            'isRepeat'=>'Повторяющееся'
        ];
    }
}