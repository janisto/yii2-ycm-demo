<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150825_074228_create_common_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%common}}', [
            'id' => Schema::TYPE_PK,
            'slug' => Schema::TYPE_STRING . '(128) NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'content' => Schema::TYPE_TEXT,
            'picture' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
        ], $this->tableOptions);
        $this->createIndex('idx_common_slug', '{{%common}}', 'slug', true);
        $this->createIndex('idx_common_status', '{{%common}}', 'status');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx_common_status', '{{%common}}');
        $this->dropIndex('idx_common_slug', '{{%common}}');
        $this->dropTable('{{%common}}');
    }
}
