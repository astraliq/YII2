<?php

use yii\db\Migration;

/**
 * Class m191117_052122_insertsData
 */
class m191117_052122_insertsData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id' => 1,
            'email' => 'test1@test.ru',
            'passwordHash' => '1',
        ]);
        $this->insert('users',[
            'id' => 2,
            'email' => 'test2@test.ru',
            'passwordHash' => '2',
        ]);

        $this->batchInsert('activity',[
            'title', 'description', 'dateStart', 'isBlocked','userId',
        ],[
            ['title1', 'desc1',date('Y-m-d'),1,1],
            ['title2', 'desc2',date('Y-m-d'),0,2],
            ['title3', 'desc3','2019-10-02',1,1],
            ['title4', 'desc4',date('Y-m-d'),1,2],
            ['title5', 'desc5','2019-11-12',0,2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('activity',['title'=>'title1']);
        $this->delete('activity',['title'=>'title2']);
        $this->delete('activity',['title'=>'title3']);
        $this->delete('activity',['title'=>'title4']);
        $this->delete('activity',['title'=>'title5']);
        $this->delete('users',['id'=>1]);
        $this->delete('users',['id'=>2]);


    }

}
