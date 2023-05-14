<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Signup $signUp*/
/** @var app\models\Profiles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profiles-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col col-md-6">
            <?= $form->field($model, 'sname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($signUp, 'email')->textInput() ?>

            <?= $form->field($signUp, 'username')->textInput() ?>

            <?= $form->field($signUp, 'password')->textInput() ?>

            <?= $form->field($signUp, 'retypePassword')->textInput() ?>
        </div>
        <div class="col col-md-6">

            <?= $form->field($model, 'gender')->dropDownList(['0'=>'Выбрать пол ...', '1'=>'Мужчина', '2'=>'Женщина']) ?>

            <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Укажите дату рождения'],
                'language' => 'ru',
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                ]
            ]); ?>

            <?= $form->field($model, 'adress')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($model->getAllType(),'id', 'name'),['prompt'=>'Выбрать ...']) ?>

            <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => ['showPreview' => false,'showUpload' => false,]
            ]); ?>

        </div>

        <div class="col col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
