<?php

namespace app\migrations;

use Yii;

class Migration extends \yii\db\Migration
{
    /**
     * @var string additional SQL fragment that will be appended to the generated SQL.
     */
    protected $tableOptions;

    /**
     * @var string DBMS BLOB-type.
     */
    protected $blobType;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        switch (Yii::$app->db->driverName) {
            case 'mysql':
                $this->tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
                $this->blobType = 'LONGBLOB';
                break;
            case 'pgsql':
                $this->blobType = 'BYTEA';
                break;
            default:
                throw new \RuntimeException('Your database is not supported!');
        }
    }
}
