<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedback;

/**
 * SearchFeedback represents the model behind the search form of `app\models\Feedback`.
 */
class SearchFeedback extends Feedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_id', 'product_id'], 'integer'],
            [['create_date', 'feedback_author', 'feedback_email', 'feedback_text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Feedback::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'feedback_id' => $this->feedback_id,
            'create_date' => $this->create_date,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'feedback_author', $this->feedback_author])
            ->andFilterWhere(['like', 'feedback_email', $this->feedback_email])
            ->andFilterWhere(['like', 'feedback_text', $this->feedback_text]);

        return $dataProvider;
    }
}
