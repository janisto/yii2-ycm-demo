<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Basic;

/**
 * BasicSearch represents the model behind the search form about `app\models\Basic`.
 */
class BasicSearch extends Basic
{
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
        $query = Basic::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
     * Config for attribute widgets (ycm module)
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
     * Config for list view (ycm module)
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
