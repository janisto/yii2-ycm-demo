<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%basic}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $public
 * @property string $created_at
 * @property string $updated_at
 */
class Basic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%basic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['public'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'public' => 'Public',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
