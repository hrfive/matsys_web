<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialdetail */

$this->title = 'Create Materialdetail';
$this->params['breadcrumbs'][] = ['label' => 'Materialdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materialdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
