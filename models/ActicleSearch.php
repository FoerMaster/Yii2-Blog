<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Art;

/**
 * ActicleSearch represents the model behind the search form of `app\models\Art`.
 */
class ActicleSearch extends Art
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'views', 'uid', 'status'], 'integer'],
            [['title', 'desc', 'content', 'img', 'date'], 'safe'],
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
        $query = Art::find();

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
            'id' => $this->id,
            'views' => $this->views,
            'uid' => $this->uid,
            'status' => $this->status,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
