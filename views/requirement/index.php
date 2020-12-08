<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Requests';
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'DeptCode',
             'format'=>'raw',
             'value' => function($data)
                    {
                      return
                      Html::a($data->MaterialCode, ['materialdetail/index2', 'matcode' => $data->MaterialCode]);
                    }
            ],
            'MaterialCode',
            'MaterialName',
            'Quantity',
            'Status',
            'Remarks',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
