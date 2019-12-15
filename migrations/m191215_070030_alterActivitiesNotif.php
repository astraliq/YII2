<?php

use yii\db\Migration;

/**
 * Class m191215_070030_alterActivitiesNotif
 */
class m191215_070030_alterActivitiesNotif extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','useNotification',$this->boolean()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','useNotification');
    }


}
