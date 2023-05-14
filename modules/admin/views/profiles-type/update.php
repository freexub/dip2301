<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProfilesType $model */

$this->title = 'Update Profiles Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profiles-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
