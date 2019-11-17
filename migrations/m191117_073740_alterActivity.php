<?php

use yii\db\Migration;

/**
 * Class m191117_073740_alterActivity
 */
class m191117_073740_alterActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','repeatType',$this->integer()->defaultValue(0)
            ->comment('0 - без повторений, 1 - Каждый день, 2 - Каждую неделю, 3 - Каждый месяц'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity','repeatType');
    }

}
