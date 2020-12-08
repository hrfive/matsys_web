<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materialdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'MaterialCode') ?>

    <?= $form->field($model, 'MaterialName') ?>

    <?= $form->field($model, 'CategoryCode') ?>

    <?= $form->field($model, 'WorkingStatus') ?>

    <?php // echo $form->field($model, 'Color') ?>

    <?php // echo $form->field($model, 'Manufacturer') ?>

    <?php // echo $form->field($model, 'PurchaseDate') ?>

    <?php // echo $form->field($model, 'PurchasePrice') ?>

    <?php // echo $form->field($model, 'SupplierCode') ?>

    <?php // echo $form->field($model, 'CurrentValue') ?>

    <?php // echo $form->field($model, 'MaintenanceId') ?>

    <?php // echo $form->field($model, 'TotalExpense') ?>

    <?php // echo $form->field($model, 'DepreciationRate') ?>

    <?php // echo $form->field($model, 'LastDepeciation') ?>

    <?php // echo $form->field($model, 'IssuedTo') ?>

    <?php // echo $form->field($model, 'Issued') ?>

    <?php // echo $form->field($model, 'IssueDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
