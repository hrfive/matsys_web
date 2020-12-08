<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requirement".
 *
 * @property int $Id
 * @property int $DeptCode
 * @property int $MaterialCode
 * @property string $MaterialName
 * @property int $Quantity
 * @property int $Status
 * @property string $Remarks
 */
class Requirement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DeptCode', 'MaterialCode', 'MaterialName', 'Quantity', 'Status', 'Remarks'], 'required'],
            [['DeptCode', 'MaterialCode', 'Quantity', 'Status'], 'integer'],
            [['MaterialName', 'Remarks'], 'string', 'max' => 100],
            //[['Status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'DeptCode' => 'Dept Code',
            'MaterialCode' => 'Material Code',
            'MaterialName' => 'Material Name',
            'Quantity' => 'Quantity',
            'Status' => 'Status',
            'Remarks' => 'Remarks',
        ];
    }
}
