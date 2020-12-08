<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Idle for material code: ' . $matCode;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Material Requests', 'url' => ['requirement/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materialdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout'=>"{items}",
        'options' => ['style' => 'width:80%'],
        //'options' => ['style' => 'font-size:8px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            'MaterialCode',
            'MaterialName',
            'CategoryCode',
            'WorkingStatus',
            'Color',
            'Manufacturer',
            //'PurchaseDate',
            [
               'attribute' => 'PurchaseDate',
               'format' => ['date', 'php:d/m/Y'],
            ],
            'PurchasePrice',
            'SupplierCode',
            'CurrentValue',
            'MaintenanceId',
            'TotalExpense',
            'DepreciationRate',
            'LastDepeciation',
            'IssuedTo',
            'Issued',
            'IssueDate',

            ['class' => 'yii\grid\ActionColumn2'],
        ],
    ]); ?>


</div>