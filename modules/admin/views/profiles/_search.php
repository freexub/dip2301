<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\ProfilesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'sname') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->field($model, 'iin') ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($model->getAllType(), 'id', 'name'),['prompt' => 'Выбрать профиль ...']) ?>
        </div>
        <div class="col-md-1 pt-4">
            <div class="form-group pt-2">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
