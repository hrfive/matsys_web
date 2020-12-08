<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'DeptCode') ?>

    <?= $form->field($model, 'MaterialCode') ?>

    <?= $form->field($model, 'MaterialName') ?>

    <?= $form->field($model, 'Quantity') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'Remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
