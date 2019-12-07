<?php


namespace app\components;


use app\models\Activity;
use app\rules\OwnerActivityRule;
use yii\base\Component;
use yii\rbac\ManagerInterface;

class RbacComponent extends Component
{
    private function  getManager():ManagerInterface
    {
        return \Yii::$app->authManager;
    }

    public function generateRbac()
    {
        $manager=$this->getManager();
        $manager->removeAll();

        $admin=$manager->createRole('admin');
        $user=$manager->createRole('user');

        $manager->add($admin);
        $manager->add($user);

        $createActivity=$manager->createPermission('createActivity');
        $createActivity->description='Создание активностей';
        $manager->add($createActivity);

        $rule=new OwnerActivityRule();
        $manager->add($rule);

        $viewOwnerActivity=$manager->createPermission('viewOwnerActivity');
        $viewOwnerActivity->description='Просмотр своих активностей';
        $viewOwnerActivity->ruleName=$rule->name;
        $manager->add($viewOwnerActivity);

        $adminActivity=$manager->createPermission('adminActivity');
        $adminActivity->description='Просмотр всех активностей';
        $manager->add($adminActivity);

        $manager->addChild($user,$createActivity);
        $manager->addChild($user,$viewOwnerActivity);
        $manager->addChild($admin,$user);
        $manager->addChild($admin,$adminActivity);

        $manager->assign($user,1);
        $manager->assign($user,2);
        $manager->assign($user,3);
        $manager->assign($admin,4);

    }

    public function canCreateActivity():bool
    {
        return \Yii::$app->user->can('createActivity');
    }
    public function canViewActivity(Activity $activity):bool
    {
        if (\Yii::$app->user->can('adminActivity')) {
            return true;
        }
        if (\Yii::$app->user->can('viewOwnerActivity',['activity'=>$activity])) {
            return true;
        }
        return false;
    }
    public function canViewAll():bool
    {
        if (\Yii::$app->user->can('adminActivity')) {
            return true;
        }
        return false;
    }

}