<?php

namespace app\models;

use Yii;
use janisto\ycm\behaviors\FileBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%common}}".
 *
 * @property integer $id
 * @property string $slug
 * @property integer $status
 * @property string $title
 * @property string $content
 * @property string $picture
 * @property string $created_at
 * @property string $updated_at
 */
class Common extends \yii\db\ActiveRecord
{
    const STATUS_VISIBLE = 1;
    const STATUS_ARCHIVED = 2;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique' => true,
            ],
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('UTC_TIMESTAMP()'), // one could also use NOW()
            ],
            [
                'class' => FileBehavior::className(),
                'folderName' => 'common',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%common}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'title'], 'required'],
            [['status'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            ['status', 'in', 'range' => [self::STATUS_VISIBLE, self::STATUS_ARCHIVED]],
            [['picture'], 'image', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 1, 'maxWidth' => 1600, 'maxHeight' => 1600],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Page name (URL)',
            'status' => 'Status',
            'title' => 'Title',
            'content' => 'Content',
            'picture' => 'Picture',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
