<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Profiles $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profiles-view">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/photo/<?=$model->getPhoto()?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?=$model->getFullName()?></h3>
                    <p class="text-muted text-center"><?=$model->type->name ?></p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Сообщения от учеников</b> <a class="float-right">941</a>
                        </li>
                        <li class="list-group-item">
                            <b>Сообщения от учителей</b> <a class="float-right">356</a>
                        </li>
                        <li class="list-group-item">
                            <b>Сообщения от администрации</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>
                    <?= Html::a('Редактировать', ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary btn-block']) ?>
                    <?= Html::a('Удалить', ['delete', 'user_id' => $model->user_id], [
                        'class' => 'btn btn-danger btn-block',
                        'data' => [
                            'confirm' => 'Вы уверены? Вы хотите удалить профиль сотрудника?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>

            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Дополнительная информация</h3>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-calendar mr-1"></i> Дата рождения</strong>
                    <p class="text-muted">
                        <?= $model->birthday?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Адрес проживания</strong>
                    <p class="text-muted"><?= $model->adress?></p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i> ИИН</strong>
                    <p class="text-muted"><?=$model->iin?></p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h4>Входящие сообщения</h4>
                    <hr>
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/photo/user1.jpg" alt="user image">
                            <span class="username">
                                <a href="#">Евгений Бурк</a>
                            </span>
                            <span class="description">Сегодня - 7:45</span>
                        </div>
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore.
                        </p>
                        <p>
                            <a href="#" class="link-black text-sm"><i class="fas fa-user mr-1"></i> Сотрудник</a>
                        </p>
                    </div>
                    <div class="post clearfix">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/photo/user2.jpg" alt="User Image">
                            <span class="username">
                                <a href="#">Сара Росс</a>
                            </span>
                            <span class="description">3 дня назад</span>
                        </div>
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore.
                        </p>
                        <p>
                            <a href="#" class="link-black text-sm"><i class="fas fa-user mr-1"></i> Сотрудник</a>
                        </p>
                    </div>
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/photo/user1.jpg" alt="user image">
                            <span class="username">
                                <a href="#">Евгений Бурк</a>
                            </span>
                            <span class="description">5 дней назад</span>
                        </div>

                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore.
                        </p>
                        <p>
                            <a href="#" class="link-black text-sm"><i class="fas fa-user mr-1"></i> Сотрудник</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
