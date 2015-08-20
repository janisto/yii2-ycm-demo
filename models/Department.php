<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%department}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Blog[] $blogs
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['department_id' => 'id']);
    }

    /**
     * Config for attribute widgets (ycm)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return [
            ['description', 'wysiwyg'],
        ];
    }

    /**
     * Grid view columns for ActiveDataProvider (ycm)
     *
     * @return array
     */
    public function gridViewColumns()
    {
        return [
            'id',
            'name',
            'description:html',
        ];
    }

    /**
     * Grid view sort for ActiveDataProvider (ycm)
     *
     * @return array
     */
    public function gridViewSort()
    {
        return [
            'defaultOrder' => [
                //'id' => SORT_DESC,
            ]
        ];
    }
}
