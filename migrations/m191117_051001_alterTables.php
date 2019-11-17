<?php

use yii\db\Migration;

/**
 * Class m191117_051001_alterTables
 */
class m191117_051001_alterTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','userId',$this->integer()->notNull());
        $this->addForeignKey('activityUserFK','activity', 'userId','users','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activityUserFK','activity');
        $this->dropColumn('activity','userId');
    }

}
