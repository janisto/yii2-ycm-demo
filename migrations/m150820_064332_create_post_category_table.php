<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150820_064332_create_post_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%post_category}}', [
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $this->tableOptions);
        $this->addPrimaryKey('pk_post_category', '{{%post_category}}', 'post_id, category_id');
        $this->addForeignKey('fk_post_category_post', '{{%post_category}}', 'post_id', '{{%post}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_post_category_category', '{{%post_category}}', 'category_id', '{{%category}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_post_category_category', '{{%post_category}}');
        $this->dropForeignKey('fk_post_category_post', '{{%post_category}}');
        $this->dropPrimaryKey('pk_post_category', '{{%post_category}}');
        $this->dropTable('{{%post_category}}');
    }
}
