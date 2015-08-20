<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150820_120559_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%blog}}', [
            'id' => Schema::TYPE_PK,
            'department_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_TEXT,
        ], $this->tableOptions);
        $this->addForeignKey('fk_blog_department', '{{%blog}}', 'department_id', '{{%department}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_blog_department', '{{%blog}}');
        $this->dropTable('{{%blog}}');
    }
}
