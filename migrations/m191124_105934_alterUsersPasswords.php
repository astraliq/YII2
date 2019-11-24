<?php

use yii\db\Migration;

/**
 * Class m191124_105934_alterUsersPasswords
 */
class m191124_105934_alterUsersPasswords extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//\Yii::$app->security->generatePasswordHash($password);
        $this->update('users',['passwordHash'=>\Yii::$app->security->generatePasswordHash('123456')],['id'=>1]);
        $this->update('users',['passwordHash'=>\Yii::$app->security->generatePasswordHash('123456')],['id'=>2]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->update('users',['passwordHash'=>'1'],['id'=>1]);
        $this->update('users',['passwordHash'=>'2'],['id'=>2]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191124_105934_alterUsersPasswords cannot be reverted.\n";

        return false;
    }
    */
}
