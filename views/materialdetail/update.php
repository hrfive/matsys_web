<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialdetail */

$this->title = 'Update material detail: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['material/index','id' => $model->CategoryCode]];
$this->params['breadcrumbs'][] = ['label' => 'Material Details', 'url' => ['index', 'id' => $model->MaterialCode, 'catid' => $model->CategoryCode]];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materialdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dept' => $dept,
    ]) ?>

</div>
