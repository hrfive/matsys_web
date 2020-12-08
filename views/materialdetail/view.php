<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Materialdetail */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['material/index','id'=>$model->CategoryCode]];
$this->params['breadcrumbs'][] = ['label' => 'Material details', 'url' => ['index','id'=>$model->MaterialCode,'catid'=>$model->CategoryCode]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materialdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'MaterialCode',
            'MaterialName',
            'CategoryCode',
            'WorkingStatus',
            'Color',
            'Manufacturer',
            'PurchaseDate',
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
        ],
    ]) ?>

</div>
