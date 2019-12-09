<?php

use yii\db\Migration;

/**
 * Class m191124_044540_alterUsers
 */
class m191124_044540_alterUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('users','email',$this->string(150)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('users','email',$this->string(150)->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191124_044540_alterUsers cannot be reverted.\n";

        return false;
    }
    */
}
