<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materialcode */

$this->title = 'Create Material Code';
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => 'Material Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materialcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
