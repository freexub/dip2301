<?php

use app\models\Profiles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProfilesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Профайлы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="profiles-index">

        <h1><?php /*echo Html::encode($this->title) */?></h1>

        <p>
            <?= Html::a('Создать профайл', ['create'], ['class' => 'btn btn-success bg-teal']) ?>
        </p>


        <div class="card card-solid">
            <div class="card-header pb-0">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <?php foreach ($dataProvider->models as $profile) {?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h2 class="lead"><b><?=$profile->getFullName()?></b></h2>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="text-muted text-sm"><b>Тип профайла:</b> <?=$profile->type->name?></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><b>Адрес:</b> <?=$profile->adress?></li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><b>Телефон:</b> + 7 700 212 23 52</li>
                                                <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span><b>Дата рождения:</b> <?=$profile->birthday?></li>
                                            </ul>
                                        </div>
                                        <div class="col-4 text-center">
                                            <img src="/photo/<?=$profile->getPhoto()?>" alt="user-avatar" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-primary">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="/admin/profiles/view?user_id=<?=$profile->user_id?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>



    </div>
</div>
