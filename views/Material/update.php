<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = 'Update Material: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['index', 'id' => $model->CategoryCode]];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
