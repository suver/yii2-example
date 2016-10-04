<?php

use yii\db\Migration;

class m161004_072129_books extends Migration
{
    public function up()
    {
        $this->db->createCommand("CREATE TABLE `books_catalog` ( 
                `id` BIGINT(20) NOT NULL AUTO_INCREMENT , 
                `title` VARCHAR(255) NOT NULL , 
                `date_publication` DATE NULL DEFAULT NULL , 
                `created_at` TIMESTAMP NULL DEFAULT NULL , 
                `updated_at` TIMESTAMP NULL DEFAULT NULL , 
                PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;")->execute();

        $this->db->createCommand("CREATE TABLE `books_authors` ( 
                `id` BIGINT(20) NOT NULL AUTO_INCREMENT , 
                `full_name` VARCHAR(255) NOT NULL , 
                `created_at` TIMESTAMP NULL DEFAULT NULL ,
                 `updated_at` TIMESTAMP NULL DEFAULT NULL , 
                 PRIMARY KEY (`id`)
             ) ENGINE = InnoDB;")->execute();

        $this->db->createCommand("CREATE TABLE `books_catalog_authors` ( 
                `book_id` BIGINT(20) NOT NULL , 
                `author_id` BIGINT(20) NOT NULL , 
                PRIMARY KEY (`book_id`, `author_id`)
            ) ENGINE = InnoDB;")->execute();
    }

    public function down()
    {
        echo "m161004_072129_book_catalog cannot be reverted.\n";

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
