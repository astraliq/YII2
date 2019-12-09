<?php


namespace app\components;


use app\models\Users;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use yii\base\Component;

class AuthComponent extends Component
{
    public function signIn(Users $model) :bool
    {
        $model->scenarioSignIn();
        if (!$model->validate(['email','password'])){
            return false;
        }
        $user=$this->getUserByEmail($model->email);
        if (!$this->validatePassword($model->password,$user->passwordHash)){
            $model->addError('password','Неверный пароль');
            return false;
        };
        return \Yii::$app->user->login($user,0);
    }

    private function validatePassword($password,$passwordHash) {
        return \Yii::$app->security->validatePassword($password,$passwordHash);
    }

    private function getUserByEmail($email){
        return Users::find()->andWhere(['email'=>$email])->one();
    }

    public function signUp(Users $model) :bool
    {
        $model->scenarioSignUp();
        if (!$model->validate(['email','password'])){
            return false;
        }
        $model->passwordHash=$this->genPasswordHash($model->password);

        if ($model->save()){
            return true;
        }
        return false;
    }


    private function genPasswordHash(string $password) {
        return \Yii::$app->security->generatePasswordHash($password);
    }
}