<?php


namespace app\components;



use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $modelClass;

    public function init()
    {
        parent::init();

        // TODO: Change the autogenerated stub
    }

    public function getModel()
    {
        return new $this->modelClass;
    }

    public function addActivity(Activity $activity) :bool
    {
        $activity->filesReal = UploadedFile::getInstances($activity, 'filesReal');
        $fileSaver = \Yii::createObject(['class' => FileSaverComponent::class]);
        $activity->userId=\Yii::$app->user->getId();

        if ($activity->validate()) {

            foreach ($activity->filesReal as &$file) {
                $file = $fileSaver->saveFile($file);
                if (!$file) {
                    return false;
                }
            }
            $activity->files = implode('|',$activity->filesReal);
            // валидация + сохранение активности
            if ($activity->save(false)) {
                return true;
            }
            \Yii::error($activity->getErrors());
            return false;
        }
        //валидация файлов не прошла
        return false;
    }

    public function deleteActivity(Activity $activity) {
        if ($activity->validate()) {
            $activity->deleted = 1;
            if ($activity->save(false)) {
                return true;
            }
            \Yii::error($activity->getErrors());
            return false;
        }
        return false;
    }

    public function restoreActivity(Activity $activity) {
        if ($activity->validate()) {
            $activity->deleted = 0;
            if ($activity->save(false)) {
                return true;
            }
            \Yii::error($activity->getErrors());
            return false;
        }
        return false;
    }

    public function fullDeleteActivity(Activity $activity) {
        if ($activity->delete()) {
            return true;
        }
        \Yii::error($activity->getErrors());
        return false;
    }

    public function findTodayNotifActivity() {
        return Activity::find()
            ->andWhere('useNotification = 1')
            ->andWhere('dateStart>=:date',[':date'=>date('Y-m-d')])
            ->andWhere('dateStart<=:date2',[':date2'=>date('Y-m-d'. ' 23:59:59')])->all();
    }


}