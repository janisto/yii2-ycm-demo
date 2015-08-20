<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150820_064305_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_TEXT,
        ], $this->tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
