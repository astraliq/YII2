<?php

namespace app\models;

use Yii;
use function Prophecy\Argument;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $passwordHash
 * @property string $authKey
 * @property string $token
 * @property string $createdAt
 *
 * @property Activity[] $activities
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['createdAt'], 'safe'],
            [['email', 'passwordHash', 'authKey', 'token'], 'string', 'max' => 150],
            ['country','string','min' => 1,'max' => 100],
            ['name','string','min' => 1,'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => Yii::t('app', 'ID'),
//            'email' => Yii::t('app', 'Email'),
//            'passwordHash' => Yii::t('app', 'Password Hash'),
//            'authKey' => Yii::t('app', 'Auth Key'),
//            'token' => Yii::t('app', 'Token'),
//            'createdAt' => Yii::t('app', 'Created At'),
//            'name' => Yii::t('app', 'Name'),
//            'country' => Yii::t('app', 'Country'),
//            'birthday' => Yii::t('app', 'Birthday'),
//        ];
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::class, ['userId' => 'id']);
    }
}
