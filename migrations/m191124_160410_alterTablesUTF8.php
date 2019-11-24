<?php

use yii\db\Migration;

/**
 * Class m191124_160410_alterTablesUTF8
 */
class m191124_160410_alterTablesUTF8 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER DATABASE `task_mgr` charset=utf8;");
        $this->execute("ALTER TABLE `task_mgr`.`users` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;");
        $this->execute("ALTER TABLE `task_mgr`.`activity` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191124_160410_alterTablesUTF8 cannot be reverted.\n";

        return false;
    }
    */
}
