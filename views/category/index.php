<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create/Edit Material Codes', ['materialcode/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create/Edit Supplier Codes', ['supplier/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Material Requests', ['requirement/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'CategoryCode',
            ['attribute'=>'CategoryCode',
             'format'=>'raw',
             'value' => function($data)
                    {
                      return
                      Html::a($data->CategoryCode, ['material/index','id'=>$data->CategoryCode]);
                    }
            ],
            'CategoryName',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
