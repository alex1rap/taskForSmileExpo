<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Photos;

/**
 * SearchPhotos represents the model behind the search form of `app\models\Photos`.
 */
class SearchPhotos extends Photos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_id', 'product_id'], 'integer'],
            [['photo_src'], 'safe'],
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
        $query = Photos::find();

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
            'photo_id' => $this->photo_id,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'photo_src', $this->photo_src]);

        return $dataProvider;
    }
}
