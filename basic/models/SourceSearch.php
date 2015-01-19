<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Source;

/**
 * SourceSearch represents the model behind the search form about `app\models\Source`.
 */
class SourceSearch extends Source
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sourceId', 'authorId', 'year', 'status', 'sourceRatingId'], 'integer'],
            [['type', 'title', 'place', 'publisher', 'keywords', 'text', 'summary'], 'safe'],
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
        $query = Source::find();

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
            'sourceId' => $this->sourceId,
            'authorId' => $this->authorId,
            'year' => $this->year,
            'status' => $this->status,
            'sourceRatingId' => $this->sourceRatingId,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'publisher', $this->publisher])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'summary', $this->summary]);

        return $dataProvider;
    }
}
