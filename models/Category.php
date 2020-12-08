<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $CategoryCode
 * @property string $CategoryName
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CategoryCode', 'CategoryName'], 'required'],
            [['CategoryCode'], 'integer'],
            [['CategoryName'], 'string', 'max' => 30],
            [['CategoryCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CategoryCode' => 'Category Code',
            'CategoryName' => 'Category Name',
        ];
    }
}
