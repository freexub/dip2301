<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ItemsList $model */

$this->title = 'Create Items List';
$this->params['breadcrumbs'][] = ['label' => 'Items Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
