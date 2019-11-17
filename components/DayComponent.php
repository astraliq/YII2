<?php


namespace app\components;


use app\models\Activity;
use app\models\Day;
use yii\base\Component;

class DayComponent extends Component
{
    public $modelClass;

    public function getModel()
    {
        return new $this->modelClass;
    }

    protected function checkBlockedActivities(Day $day) :bool
    {
        foreach ($day->dayActivities as $dayActivity) {
            if ($dayActivity->isBlocked) {
                return false;
            }
        }
        return true;
    }

    public function addActivity(Activity $activity, Day $day) :bool
    {
        if ($this->checkBlockedActivities($day)) {
            if ($activity->isBlocked && !empty($day->dayActivities)) {
                $day->blockedActivities = $day->dayActivities;
                $day->dayActivities = [];
            }
            array_push($day->dayActivities, $activity);
            return true;
        }
        return false;
    }
}