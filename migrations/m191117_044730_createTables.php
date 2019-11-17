<?php

use yii\db\Migration;

/**
 * Class m191117_044730_createTables
 */
class m191117_044730_createTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'description' => $this->string(250)->notNull(),
            'dateStart' => $this->dateTime()->notNull(),
            'dateEnd' => $this->dateTime()->defaultValue(null),
            'isBlocked' => $this->boolean()->notNull()->defaultValue(0),
            'isRepeat' => $this->boolean()->notNull()->defaultValue(0),
            'email' => $this->string(150),
            'files' => $this->string(250)->defaultValue(null),
//            'authorId' => $this->integer()->notNull(),
            'createdAt' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('users',[
            'id' => $this->primaryKey(),
            'email' => $this->string(150),
            'passwordHash' => $this->string(150),
            'authKey' => $this->string(150),
            'token' => $this->string(150),
            'createdAt' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('emailUniqueInd', 'users', 'email',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('emailUniqueInd','users');
        $this->dropTable('users');
        $this->dropTable('activity');
    }

}
