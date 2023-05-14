<?php

use app\models\ItemsList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemsListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-list-index">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?> </h3>
            <div class="card-tools">
                <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

        </div>

        <div class="card-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'about:ntext',
                    'photo',
                    'active',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, ItemsList $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>

    </div>

</div>
