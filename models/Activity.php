<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $dateStart;
    public $duration;
    public $isEnding;
    public $dateEnd;
    public $isBlocked;
    public $isRepeat;
    public $authorId;

    public function rules()
    {
        return [
            [['title', 'description', 'dateStart'],'required'],
            ['description','string','min' => 2,'max' => 250],
            [['dateStart','dateEnd'],'string'],
            [['isBlocked','isRepeat','isEnding'],'boolean'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'title'=>'Название события',
            'description'=>'Описание',
            'dateStart'=>'Дата создания',
            'dateEnd'=>'Дата завершения',
            'isEnding'=>'Установить дату завершения',
            'isBlocked'=>'Блокирующее',
            'isRepeat'=>'Повторяющееся',
        ];
    }
}