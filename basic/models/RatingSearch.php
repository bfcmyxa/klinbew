<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rating;

/**
 * RatingSearch represents the model behind the search form about `app\models\Rating`.
 */
class RatingSearch extends Rating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ratingId', 'ratedBy', 'evidenceValue', 'relevanceValue', 'signValue', 'use', 'risk'], 'integer'],
            [['ratingDate', 'evidenceText', 'relevanceText', 'signText', 'ratingSummary'], 'safe'],
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
        $query = Rating::find();

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
            'ratingId' => $this->ratingId,
            'ratedBy' => $this->ratedBy,
            'ratingDate' => $this->ratingDate,
            'evidenceValue' => $this->evidenceValue,
            'relevanceValue' => $this->relevanceValue,
            'signValue' => $this->signValue,
            'use' => $this->use,
            'risk' => $this->risk,
        ]);

        $query->andFilterWhere(['like', 'evidenceText', $this->evidenceText])
            ->andFilterWhere(['like', 'relevanceText', $this->relevanceText])
            ->andFilterWhere(['like', 'signText', $this->signText])
            ->andFilterWhere(['like', 'ratingSummary', $this->ratingSummary]);

        return $dataProvider;
    }
}
