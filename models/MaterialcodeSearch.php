<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materialcode;

/**
 * MaterialcodeSearch represents the model behind the search form of `app\models\Materialcode`.
 */
class MaterialcodeSearch extends Materialcode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MaterialCode'], 'integer'],
            [['MaterialName'], 'safe'],
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
        $query = Materialcode::find();

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
            'MaterialCode' => $this->MaterialCode,
        ]);

        $query->andFilterWhere(['like', 'MaterialName', $this->MaterialName]);

        return $dataProvider;
    }
}
