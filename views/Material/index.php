<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materials';
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Material', ['create','id'=>$catCode], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout'=>"{items}",
        'options' => ['style' => 'width:80%'],
        //'options' => ['style' => 'font-size:12px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'Id',
            //'MaterialCode',
            ['attribute'=>'MaterialCode',
             'format'=>'raw',
             'value' => function($data)
                    {
                      return
                      Html::a($data->MaterialCode, ['materialdetail/index','id'=>$data->MaterialCode,'catid'=>$data->CategoryCode]);
                    }
            ],
            'MaterialName',
            'CategoryCode',
            'Quantity',
            'Remarks',
            //[
              //'label' => 'Remarks',
              //'attribute' =>'Remarks',
              //'contentOptions' => ['style' => 'font-size:12px;']
            //],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
