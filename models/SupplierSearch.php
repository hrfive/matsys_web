<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form of `app\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SupplierCode', 'PostalCode'], 'integer'],
            [['SupplierName', 'SupplierAddress1', 'SupplierAddress2', 'PhoneNo'], 'safe'],
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
        $query = Supplier::find();

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
            'SupplierCode' => $this->SupplierCode,
            'PostalCode' => $this->PostalCode,
        ]);

        $query->andFilterWhere(['like', 'SupplierName', $this->SupplierName])
            ->andFilterWhere(['like', 'SupplierAddress1', $this->SupplierAddress1])
            ->andFilterWhere(['like', 'SupplierAddress2', $this->SupplierAddress2])
            ->andFilterWhere(['like', 'PhoneNo', $this->PhoneNo]);

        return $dataProvider;
    }
}
