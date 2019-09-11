<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientAdress;

/**
 * ClientAdressSearch represents the model behind the search form of `app\models\ClientAdress`.
 */
class ClientAdressSearch extends ClientAdress
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'building', 'office'], 'integer'],
            [['postcode', 'country', 'sity', 'street'], 'safe'],
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
        $query = ClientAdress::find();

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
            'parent_id' => $this->parent_id,
            'building' => $this->building,
            'office' => $this->office,
        ]);

        $query->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'sity', $this->sity])
            ->andFilterWhere(['like', 'street', $this->street]);

        return $dataProvider;
    }
}