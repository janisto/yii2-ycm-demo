<?php

use app\migrations\Migration;
use yii\db\Schema;

class m150818_100418_create_example_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%example}}', [
            'id' => Schema::TYPE_PK,
            'field_widget' => Schema::TYPE_STRING,
            'field_wysiwyg' => Schema::TYPE_TEXT,
            'field_date' => Schema::TYPE_DATE,
            'field_time' => Schema::TYPE_TIME,
            'field_datetime' => Schema::TYPE_DATETIME,
            'field_select' => Schema::TYPE_STRING,
            'field_selectMultiple' => Schema::TYPE_STRING,
            'field_image' => Schema::TYPE_STRING,
            'field_file' => Schema::TYPE_STRING,
            'field_text' => Schema::TYPE_STRING,
            'field_hidden' => Schema::TYPE_STRING,
            'field_password' => Schema::TYPE_STRING,
            'field_textarea' => Schema::TYPE_TEXT,
            'field_radio' => Schema::TYPE_STRING,
            'field_boolean' => Schema::TYPE_BOOLEAN,
            'field_checkbox' => Schema::TYPE_BOOLEAN,
            'field_dropdown' => Schema::TYPE_STRING,
            'field_listbox' => Schema::TYPE_STRING,
            'field_checkboxList' => Schema::TYPE_STRING,
            'field_radioList' => Schema::TYPE_STRING,
            'field_disabled' => Schema::TYPE_STRING,
            'field_hide' => Schema::TYPE_STRING,
            'field_html5' => Schema::TYPE_STRING,
        ], $this->tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%example}}');
    }
}
