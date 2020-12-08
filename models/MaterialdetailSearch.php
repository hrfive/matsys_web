<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materialdetail;

/**
 * MaterialdetailSearch represents the model behind the search form of `app\models\Materialdetail`.
 */
class MaterialdetailSearch extends Materialdetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'MaterialCode', 'CategoryCode', 'WorkingStatus', 'PurchasePrice', 'SupplierCode', 'CurrentValue', 'TotalExpense', 'IssuedTo'], 'integer'],
            [['MaterialName', 'Color', 'Manufacturer', 'PurchaseDate', 'MaintenanceId', 'DepreciationRate', 'LastDepeciation', 'Issued', 'IssueDate'], 'safe'],
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
        $query = Materialdetail::find();

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
            'MaterialCode' => $this->MaterialCode,
            'CategoryCode' => $this->CategoryCode,
            'WorkingStatus' => $this->WorkingStatus,
            'PurchaseDate' => $this->PurchaseDate,
            'PurchasePrice' => $this->PurchasePrice,
            'SupplierCode' => $this->SupplierCode,
            'CurrentValue' => $this->CurrentValue,
            'TotalExpense' => $this->TotalExpense,
            'LastDepeciation' => $this->LastDepeciation,
            'IssuedTo' => $this->IssuedTo,
            'IssueDate' => $this->IssueDate,
        ]);

        $query->andFilterWhere(['like', 'MaterialName', $this->MaterialName])
            ->andFilterWhere(['like', 'Color', $this->Color])
            ->andFilterWhere(['like', 'Manufacturer', $this->Manufacturer])
            ->andFilterWhere(['like', 'MaintenanceId', $this->MaintenanceId])
            ->andFilterWhere(['like', 'DepreciationRate', $this->DepreciationRate])
            ->andFilterWhere(['like', 'Issued', $this->Issued]);

        return $dataProvider;
    }
}
