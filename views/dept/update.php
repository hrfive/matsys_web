<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dept */

$this->title = 'Update Department: ' . $model->DeptCode;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DeptCode, 'url' => ['view', 'id' => $model->DeptCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dept-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
