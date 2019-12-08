<?php

use yii\db\Migration;

/**
 * Class m191208_105010_alterTableActivity
 */
class m191208_105010_alterTableActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','deleted',$this->boolean()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','deleted');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191208_105010_alterTableActivity cannot be reverted.\n";

        return false;
    }
    */
}
