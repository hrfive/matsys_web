<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materialcode".
 *
 * @property int $MaterialCode
 * @property string $MaterialName
 */
class Materialcode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materialcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MaterialCode', 'MaterialName'], 'required'],
            [['MaterialCode'], 'integer'],
            [['MaterialName'], 'string', 'max' => 100],
            [['MaterialCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MaterialCode' => 'Material Code',
            'MaterialName' => 'Material Name',
        ];
    }
}
