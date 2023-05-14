<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProfilesType $model */

$this->title = 'Добавиление типа профайла';
$this->params['breadcrumbs'][] = ['label' => 'Типы профайлов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
