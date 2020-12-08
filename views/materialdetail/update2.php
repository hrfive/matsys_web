<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialdetail */

$this->title = 'Update material detail: ' . $model->Id;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materialdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Back', ['index2', 'matcode'=>$model->MaterialCode], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'dept' => $dept,
    ]) ?>

</div>