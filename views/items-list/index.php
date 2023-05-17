<?php

use app\models\ItemsList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemsList $model */
/** @var app\models\ItemsListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Склад';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h5 class="modal-title" id="exampleModalLabel">Добавление категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->render('_form', ['model' => $model]); ?>
            </div>
        </div>
    </div>
</div>
<div class="items-list-index">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?> </h3>
            <div class="card-tools">
                <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success', 'data-toggle' => 'modal', 'data-target' => '#exampleModal',]) ?>
            </div>

        </div>

        <div class="card-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' =>'id',
                        'headerOptions' => ['style' => 'width:5%'],
                        'format' => 'raw',
                        'value' => function($data){
                            return $data->id;
                        },
                    ],
                    [
                        'format' => 'raw',
                        'value' => function($data){
                            return '<img class="img-circle" style="width:65px" src="'.Yii::getAlias( '@web' ).'/items_photo/'.$data->photo.'">';
                        },
                    ],
                    [
                        'attribute' =>'name',
                        'headerOptions' => ['style' => 'width:60%'],
                        'format' => 'raw',
                        'value' => function($data){
                            $category_name = '<small class="badge badge-secondary"> Категория не назначена</small>';
                            $price = '<small class="badge badge-warning"> '.$data->price.' тг.</small>';
                            $count = '<small class="badge badge-primary"> '.$data->item_count.' шт.</small>';
                            if ($data->category_id!=null)
                                $category_name = '<small class="badge badge-info"> '.$data->categoryName->name.'</small>';
                            return $data->name.'<p>'.$category_name. ' '. $price . ' '. $count .'</p>';
                        },
                    ],
                    [
                        'attribute' =>'active',
                        'format' => 'raw',
                        'value' => function($data){
                            switch ($data->active) {
                                case 0 :
                                    return '<span class="badge badge-success">Активен</span>';
                                    break;
                                case 1 :
                                    return '<span class="badge badge-danger">Отключен</span>';
                                    break;
                            }
                        },
                        'filter' => ['0' => 'Активная','1' => 'Отключена',]
                    ],
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
