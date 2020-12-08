<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dept".
 *
 * @property int $DeptCode
 * @property string $DeptName
 * @property string $ManagerName
 */
class Dept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DeptCode', 'DeptName', 'ManagerName'], 'required'],
            [['DeptCode'], 'integer'],
            [['DeptName', 'ManagerName'], 'string', 'max' => 30],
            [['DeptCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DeptCode' => 'Department Code',
            'DeptName' => 'Department Name',
            'ManagerName' => 'Manager Name',
        ];
    }
}
