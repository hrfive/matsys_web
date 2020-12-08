<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenance".
 *
 * @property int $Id
 * @property int $MaterialId
 * @property int $MaintenanceCost
 */
class Maintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MaterialId', 'MaintenanceCost'], 'required'],
            [['MaterialId', 'MaintenanceCost'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'MaterialId' => 'Material ID',
            'MaintenanceCost' => 'Maintenance Cost',
        ];
    }
}
