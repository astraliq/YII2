<?php

use yii\db\Migration;

/**
 * Class m191216_175404_alterUsers
 */
class m191216_175404_alterUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','name',$this->string(100)->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users','name');
    }

}
