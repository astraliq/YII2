<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $date;
    public $isHoliday;
    public $isWeekend;
    public $isWorkday;
    public $blockedActivities = [];
    public $dayActivities = [];




}