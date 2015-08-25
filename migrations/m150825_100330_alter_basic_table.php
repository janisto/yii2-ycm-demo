<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150825_100330_alter_basic_table extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%basic}}', 'public');;
    }

    public function down()
    {
        $this->addColumn('{{%basic}}', 'public', Schema::TYPE_BOOLEAN);
    }
}
