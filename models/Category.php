<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property PostCategory[] $postCategories
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
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
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('{{%post_category}}', ['category_id' => 'id']);
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
}
