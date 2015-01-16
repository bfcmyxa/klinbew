<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectid', 'createdBy', 'dokumentVersion', 'productVersion', 'referenceProjectId'], 'integer'],
            [['title', 'alias', 'status', 'creationDate', 'modifyDate', 'fileName', 'productName', 'productDescription'], 'safe'],
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
        $query = Project::find();

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
            'projectid' => $this->projectid,
            'createdBy' => $this->createdBy,
            'creationDate' => $this->creationDate,
            'modifyDate' => $this->modifyDate,
            'dokumentVersion' => $this->dokumentVersion,
            'productVersion' => $this->productVersion,
            'referenceProjectId' => $this->referenceProjectId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'fileName', $this->fileName])
            ->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'productDescription', $this->productDescription]);

        return $dataProvider;
    }
}
