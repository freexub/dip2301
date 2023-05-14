<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ItemsListSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="items-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view','id'=>$_GET['id']],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'active') ?>
        </div>

        <div class="col-md-2 pt-2">
            <div class="form-group pt-4">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Сброс', ['view', 'id'=>$_GET['id']],['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
