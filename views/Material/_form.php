<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MaterialCode')->dropDownList($items2, [
                                               'prompt' => 'Select Material Name....', 'id' => 'materialcode' ]) ?>

    <?= $form->field($model, 'CategoryCode')->textInput(['readonly' => true, 'value' => $catCode]) ?>


    <?= $form->field($model2, 'Manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'PurchaseDate')->widget(DatePicker::classname(), [
                                             'clientOptions'=> [
                                                 'language' => 'en',
                                                 'dateFormat' => 'yyyy-MM-dd',
                                               ]
                                         ]) ?>

    <?= $form->field($model2, 'PurchasePrice')->textInput() ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <?= $form->field($model2, 'DepreciationRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model2, 'SupplierCode')->dropDownList($items, [
                                               'prompt' => 'Select Supplier....', 'id' => 'suppliercode' ]) ?>

    <?= $form->field($model, 'Remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
