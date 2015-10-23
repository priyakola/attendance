<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_072410_add_user_id_to_activity extends Migration
{
    public function up()
    {
        $this->addColumn('activity', 'user_id', 'int');
    }

    public function down()
    {
        $this->dropColumn('activity', 'user_id');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
