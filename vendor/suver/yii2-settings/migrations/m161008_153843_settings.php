<?php

use yii\db\Migration;

class m161008_153843_settings extends Migration
{
    public function up()
    {
        $this->db->createCommand("CREATE TABLE `suver-settings` ( 
            `key` VARCHAR(100) NOT NULL, 
            `type` INT(2) NOT NULL,
            `value` TEXT NULL DEFAULT NULL,
            `user_id` BIGINT(20) NULL DEFAULT NULL, 
            `params` TEXT NULL DEFAULT NULL,
            PRIMARY KEY (`key`)
        ) ENGINE = InnoDB;")->execute();
    }

    public function down()
    {
        echo "m161008_153843_settings cannot be reverted.\n";

        return false;
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
