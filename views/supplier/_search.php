<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupplierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SupplierCode') ?>

    <?= $form->field($model, 'SupplierName') ?>

    <?= $form->field($model, 'SupplierAddress1') ?>

    <?= $form->field($model, 'SupplierAddress2') ?>

    <?= $form->field($model, 'PostalCode') ?>

    <?php // echo $form->field($model, 'PhoneNo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
