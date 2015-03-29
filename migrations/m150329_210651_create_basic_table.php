<?php

use yii\db\Schema;
use yii\db\Migration;

class m150329_210651_create_basic_table extends Migration
{
    protected $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci';

    public function up()
    {
        $this->createTable('{{%basic}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'content' => Schema::TYPE_TEXT,
            'public' => Schema::TYPE_BOOLEAN,
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%basic}}');
    }
}
