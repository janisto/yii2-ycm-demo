<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150329_201637_create_session_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%session}}', [
            'id' => 'CHAR(64) NOT NULL PRIMARY KEY',
            'expire' => Schema::TYPE_INTEGER,
            'data' => $this->blobType,
        ], $this->tableOptions);
        $this->createIndex('idx_session_expire', '{{%session}}', 'expire');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx_session_expire', '{{%session}}');
        $this->dropTable('{{%session}}');
    }
}
