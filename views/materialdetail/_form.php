<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Materialdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materialdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MaterialCode')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'MaterialName')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'CategoryCode')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'WorkingStatus')->dropDownList(['1' => '1', '2' => '2', '3' => '3', '4' => '4'], [
                                               'prompt' => 'Select WorkingStatus: 1:Working, 2:Idle, 3:Repairing, 4:Processing', 'id' => 'workingstatus' ]) ?>

    <?= $form->field($model, 'Color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PurchaseDate')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'PurchasePrice')->textInput() ?>

    <?= $form->field($model, 'SupplierCode')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'CurrentValue')->textInput() ?>

    <?= $form->field($model, 'MaintenanceId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TotalExpense')->textInput() ?>

    <?= $form->field($model, 'DepreciationRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastDepeciation')->widget(DatePicker::classname(), [
                                             'clientOptions'=> [
                                                 'language' => 'en',
                                                 'dateFormat' => 'yyyy-MM-dd',
                                               ]
                                         ]) ?>

    <?= $form->field($model, 'IssuedTo')->dropDownList($dept, [
                                               'prompt' => 'Select Department Name....', 'id' => 'DeptCode' ]) ?>


    <?= $form->field($model, 'Issued')->dropDownList(['Yes' => 'Yes', 'No' => 'No'], [
                                               'prompt' => 'Yes or No?' ]) ?>

    <?= $form->field($model, 'IssueDate')->widget(DatePicker::classname(), [
                                             'clientOptions'=> [
                                                 'language' => 'en',
                                                 'dateFormat' => 'yyyy-MM-dd',
                                               ]
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>