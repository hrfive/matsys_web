<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SupplierCode')->textInput() ?>

    <?= $form->field($model, 'SupplierName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SupplierAddress1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SupplierAddress2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PostalCode')->textInput() ?>

    <?= $form->field($model, 'PhoneNo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
