<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $SupplierCode
 * @property string $SupplierName
 * @property string $SupplierAddress1
 * @property string $SupplierAddress2
 * @property int $PostalCode
 * @property string $PhoneNo
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SupplierCode', 'SupplierName', 'SupplierAddress1', 'SupplierAddress2', 'PostalCode', 'PhoneNo'], 'required'],
            [['SupplierCode', 'PostalCode'], 'integer'],
            [['SupplierName', 'SupplierAddress1', 'SupplierAddress2'], 'string', 'max' => 30],
            [['PhoneNo'], 'string', 'max' => 15],
            [['SupplierCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SupplierCode' => 'Supplier Code',
            'SupplierName' => 'Supplier Name',
            'SupplierAddress1' => 'Supplier Address1',
            'SupplierAddress2' => 'Supplier Address2',
            'PostalCode' => 'Postal Code',
            'PhoneNo' => 'Phone No',
        ];
    }
}
