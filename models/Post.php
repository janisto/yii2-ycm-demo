<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 *
 * @property PostCategory[] $postCategories
 * @property Category[] $categories
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * Categories id array
     *
     * @var array
     */
    public $assignedCategories = [];

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();
        if (!$this->isNewRecord) {
            // Populate categories id array after find
            $this->assignedCategories = ArrayHelper::map($this->postCategories, 'category_id', 'category_id');
        }
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {
            // Delete all categories from Post on update
            $this->unlinkAll('categories', true);
        }
        if (!empty($this->assignedCategories)) {
            // Add selected categories to Post
            foreach ($this->assignedCategories as $category) {
                /** @var $model \yii\db\ActiveRecord */
                $model = Category::findOne($category);
                $this->link('categories', $model);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['title'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['assignedCategories'], 'safe'],
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
            'assignedCategories' => 'Categories',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('{{%post_category}}', ['post_id' => 'id']);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();
        $query->joinWith(['categories']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    //'id' => SORT_DESC,
                ],
            ],
        ]);

        $dataProvider->sort->attributes['assignedCategories'] = [
            'asc' => [
                'category.name' => SORT_ASC,
            ],
            'desc' => [
                'category.name' => SORT_DESC,
            ],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['category_id' => $this->assignedCategories]);

        return $dataProvider;
    }

    /**
     * Config for attribute widgets (ycm)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return [
            ['content', 'wysiwyg'],
            ['assignedCategories', 'selectMultiple'],
        ];
    }

    /**
     * Select choices for assignedCategories (ycm)
     *
     * @return array
     */
    public function assignedCategoriesChoices()
    {
        return ArrayHelper::map(Category::find()->orderBy('name ASC')->all(), 'id', 'name');
    }

    /**
     * Category names separated with a comma (ycm).
     *
     * @return string
     */
    public function getRelatedCategoryNames()
    {
        return implode(', ', ArrayHelper::map($this->categories, 'id', 'name'));
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
            'title',
            'content:html',
            [
                //'label'=>'Categories added',
                'attribute' => 'assignedCategories',
                'filter' => $this->assignedCategoriesChoices(),
                'value' => function ($model) {
                    return $model->relatedCategoryNames;
                },
            ],
        ];
    }
}
