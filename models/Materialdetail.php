<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materialdetail".
 *
 * @property int $Id
 * @property int $MaterialCode
 * @property string $MaterialName
 * @property int $CategoryCode
 * @property int $WorkingStatus
 * @property string|null $Color
 * @property string $Manufacturer
 * @property string $PurchaseDate
 * @property int $PurchasePrice
 * @property int $SupplierCode
 * @property int $CurrentValue
 * @property string|null $MaintenanceId
 * @property int $TotalExpense
 * @property string $DepreciationRate
 * @property string|null $LastDepeciation
 * @property int|null $IssuedTo
 * @property string $Issued
 * @property string|null $IssueDate
 */
class Materialdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materialdetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MaterialCode', 'MaterialName', 'CategoryCode', 'WorkingStatus', 'Manufacturer', 'PurchaseDate', 'PurchasePrice', 'SupplierCode', 'CurrentValue', 'TotalExpense', 'DepreciationRate', 'Issued'], 'required'],
            [['MaterialCode', 'CategoryCode', 'WorkingStatus', 'PurchasePrice', 'SupplierCode', 'CurrentValue', 'TotalExpense', 'IssuedTo'], 'integer'],
            [['PurchaseDate', 'LastDepeciation', 'IssueDate'], 'safe'],
            [['MaterialName'], 'string', 'max' => 100],
            [['Color', 'MaintenanceId', 'DepreciationRate'], 'string', 'max' => 10],
            [['Manufacturer'], 'string', 'max' => 30],
            [['Issued'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'MaterialCode' => 'Material Code',
            'MaterialName' => 'Material Name',
            'CategoryCode' => 'Category Code',
            'WorkingStatus' => 'Working Status',
            'Color' => 'Color',
            'Manufacturer' => 'Manufacturer',
            'PurchaseDate' => 'Purchase Date',
            'PurchasePrice' => 'Purchase Price',
            'SupplierCode' => 'Supplier Code',
            'CurrentValue' => 'Current Value',
            'MaintenanceId' => 'Maintenance ID',
            'TotalExpense' => 'Total Expense',
            'DepreciationRate' => 'Depreciation Rate',
            'LastDepeciation' => 'Last Depeciation',
            'IssuedTo' => 'Issued To',
            'Issued' => 'Issued',
            'IssueDate' => 'Issue Date',
        ];
    }
}
