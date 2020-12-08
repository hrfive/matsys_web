<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $Id
 * @property int $MaterialCode
 * @property string $MaterialName
 * @property int $CategoryCode
 * @property int $Quantity
 * @property string $Remarks
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MaterialCode', 'MaterialName', 'CategoryCode', 'Quantity', 'Remarks'], 'required'],
            [['MaterialCode', 'CategoryCode', 'Quantity'], 'integer'],
            [['MaterialName', 'Remarks'], 'string', 'max' => 100],
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
            'Quantity' => 'Quantity',
            'Remarks' => 'Remarks',
        ];
    }
}
