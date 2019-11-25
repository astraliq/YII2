<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $dateStart
 * @property string $dateEnd
 * @property int $isBlocked
 * @property int $isRepeat
 * @property string $email
 * @property string $files
 * @property string $createdAt
 * @property int $userId
 * @property int $repeatType 0 - без повторений, 1 - Каждый день, 2 - Каждую неделю, 3 - Каждый месяц
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'dateStart', 'userId'], 'required'],
            [['dateStart', 'dateEnd', 'createdAt'], 'safe'],
            [['isBlocked', 'isRepeat', 'userId', 'repeatType'], 'integer'],
            [['title', 'email'], 'string', 'max' => 150],
            [['description', 'files'], 'string', 'max' => 250],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'dateStart' => Yii::t('app', 'Date Start'),
            'dateEnd' => Yii::t('app', 'Date End'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'isRepeat' => Yii::t('app', 'Is Repeat'),
            'email' => Yii::t('app', 'Email'),
            'files' => Yii::t('app', 'Files name'),
            'createdAt' => Yii::t('app', 'Created At'),
            'userId' => Yii::t('app', 'User ID'),
            'repeatType' => Yii::t('app', 'Repeat Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userId']);
    }
}
