<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profiles $model */

$this->title = 'Добавление нового пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiles-create">

    <div class="card card-info shadow-none">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'signUp' => $signUp,
            ]) ?>
        </div>
    </div>

</div>
