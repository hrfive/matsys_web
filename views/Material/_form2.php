<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MaterialCode')->textInput(['readonly' => true, 'value' => $model->MaterialCode]) ?>

    <?= $form->field($model, 'MaterialName')->textInput(['readonly' => true, 'value' => $model->MaterialName]) ?>

    <?= $form->field($model, 'CategoryCode')->textInput(['readonly' => true, 'value' => $model->CategoryCode]) ?>

    <?= $form->field($model, 'Quantity')->textInput(['readonly' => true, 'value' => $model->Quantity]) ?>

    <?= $form->field($model, 'Remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>