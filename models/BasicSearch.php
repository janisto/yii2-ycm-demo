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
    public function rules()
    {
        return [
            [['id', 'public'], 'integer'],
            [['title', 'content', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
            'public' => $this->public,
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
            ['public', 'checkbox'],
            ['created_at', 'disabled'],
            ['updated_at', 'disabled'],
        ];
    }

    /**
     * Checkbox choices for public (ycm)
     *
     * @return array
     */
    public function publicChoices()
    {
        return [
            '0' => 'No',
            '1' => 'Yes',
        ];
    }

    /**
     * Config for list view (ycm)
     *
     * @return array
     */
    public function gridViewColumns()
    {
        return [
            'id',
            'title',
            /*
            [
                'attribute' => 'public',
                'filter' => ['0' => 'No', '1' => 'Yes'],
                'value' => function ($model) {
                    if ($model->public === 1) {
                        return 'Yes';
                    }
                    return 'No';
                },
            ],
            */
            [
                'attribute' => 'public',
                'filter' => $this->publicChoices(),
                'value' => function ($model) {
                    return $this->publicChoices()[$model->public];
                },
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ];
    }
}
