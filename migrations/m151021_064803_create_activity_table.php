<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_064803_create_activity_table extends Migration
{
    public function up()
    {
        $this->createTable('activity', [
            'id'              => $this->primaryKey(),
            'type'            => $this->string()->notNull(),
            'description'     => $this->string()->notNull(),
            'timestamp'       => $this->datetime()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('activity');
    }

}
