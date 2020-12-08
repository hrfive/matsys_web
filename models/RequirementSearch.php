<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requirement;

/**
 * RequirementSearch represents the model behind the search form of `app\models\Requirement`.
 */
class RequirementSearch extends Requirement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'DeptCode', 'MaterialCode', 'Quantity', 'Status'], 'integer'],
            [['MaterialName', 'Remarks'], 'safe'],
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
        $query = Requirement::find();

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
            'Id' => $this->Id,
            'DeptCode' => $this->DeptCode,
            'MaterialCode' => $this->MaterialCode,
            'Quantity' => $this->Quantity,
            'Status' => $this->Status,
        ]);
        $query->andFilterWhere(['like', 'MaterialName', $this->MaterialName])
            //->andFilterWhere(['like', 'Status', $this->Status]);
            ->andFilterWhere(['like', 'Remarks', $this->Remarks]);

        return $dataProvider;
    }
}