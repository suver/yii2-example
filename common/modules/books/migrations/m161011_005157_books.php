<?php

use yii\db\Migration;

class m161011_005157_books extends Migration
{
    public function up()
    {
        $this->db->createCommand("ALTER TABLE `books_catalog` 
                            ADD `description` TEXT NULL DEFAULT NULL AFTER `title`, 
                            ADD `is_hit` TINYINT(2) NOT NULL DEFAULT '0' AFTER `description`, 
                            ADD `format` VARCHAR(255) NULL DEFAULT NULL AFTER `is_hit`, 
                            ADD `number_of_pages` INT NULL DEFAULT NULL AFTER `format`, 
                            ADD `isbn` VARCHAR(50) NULL DEFAULT NULL AFTER `number_of_pages`, 
                            ADD `printing` INT(11) NULL DEFAULT NULL AFTER `isbn`, 
                            ADD `binding` TINYINT(2) NULL DEFAULT NULL AFTER `printing`, 
                            ADD `language_editions` INT(11) NULL DEFAULT NULL AFTER `binding`, 
                            ADD `age_restrictions` INT(3) NULL DEFAULT NULL AFTER `language_editions`, 
                            ADD `publication_type` TINYINT(2) NULL DEFAULT NULL AFTER `age_restrictions`, 
                            ADD `weight` DECIMAL(6,2) NULL DEFAULT NULL AFTER `publication_type`,
                            ADD INDEX `is_hit` (`is_hit`);")->execute();

        $this->db->createCommand("CREATE TABLE `books_publishers` ( 
                            `id` BIGINT(20) NOT NULL AUTO_INCREMENT , 
                            `title` VARCHAR(255) NOT NULL , 
                            `description` TEXT NULL DEFAULT NULL , 
                            `created_at` TIMESTAMP NULL DEFAULT NULL , 
                            `updated_at` TIMESTAMP NULL DEFAULT NULL , 
                            PRIMARY KEY (`id`)
                        ) ENGINE = InnoDB;")->execute();
    }

    public function down()
    {
        echo "m161011_005157_books cannot be reverted.\n";

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
