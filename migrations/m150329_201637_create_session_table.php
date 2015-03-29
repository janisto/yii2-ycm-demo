<?php

use yii\db\Schema;
use yii\db\Migration;

class m150329_201637_create_session_table extends Migration
{
    protected $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci';

    public function up()
    {
        $this->createTable('{{%session}}', [
            'id' => 'CHAR(64) NOT NULL PRIMARY KEY',
            'expire' => 'INT(11) DEFAULT NULL',
            'data' => 'LONGBLOB'
        ], $this->tableOptions);

        $this->createIndex('session_expire', '{{%session}}', 'expire');
    }

    public function down()
    {
        $this->dropIndex('session_expire', '{{%session}}');
        $this->dropTable('{{%session}}');
    }
}
