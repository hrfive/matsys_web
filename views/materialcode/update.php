<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialcode */

$this->title = 'Update Material Code: ' . $model->MaterialCode;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Material Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materialcode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
