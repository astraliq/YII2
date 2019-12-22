<?php

use yii\db\Migration;

/**
 * Class m191222_054508_alterUsersBirthday
 */
class m191222_054508_alterUsersBirthday extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','birthday',$this->dateTime()->defaultValue(null));
        $this->addColumn('users','country',$this->string(250)->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users','birthday');
        $this->dropColumn('users','country');
    }
}
