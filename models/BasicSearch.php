<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BasicSearch represents the model behind the search form about `app\models\Basic`.
 */
class BasicSearch extends Basic
{
    public $adminNames = ['Basic searches', 'basic search', 'basic searches']; // admin interface, singular, plural
    //public $hideCreateAction = true;
    //public $hideUpdateAction = true;
    public $hideDeleteAction = true;
    public $downloadCsv = true;
    public $downloadMsCsv = true;
    public $downloadExcel = true;
    public $excludeDownloadFields = ['created_at', 'updated_at'];

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['ycm-search'] = ['title', 'created_at', 'updated_at']; // Add only attributes that are used in grid view columns
        return $scenarios;
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
        $query = BasicSearch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);

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
            ['created_at', 'disabled'],
            ['updated_at', 'disabled'],
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
            'title',
            'created_at:datetime',
            'updated_at:datetime',
        ];
    }
}
