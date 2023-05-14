<?php

use app\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Категории';
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
<div class="categories-index">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?></h3>
            <div class="card-tools">
                <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success bg-olive', 'data-toggle' => 'modal', 'data-target' => '#exampleModal',]) ?>
            </div>

        </div>

        <div class="card-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
//        'showHeader' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
//            'parent_id',
//            'active',
                    [
                        'headerOptions' => ['style' => 'width:80%'],
                        'format' => 'raw',
                        'attribute' => 'name',
                        'value' => function($data){
                            if (empty($data->parent_id))
                                return $data->name;
                            else
                                return ' <span class="text text-sm float-right badge badge-info">' . $data->parent1->name . '</span>' . $data->name;
                        }
                    ],
                    [
                        'attribute' => 'active',
//                'headerOptions' => ['style' => 'width:5%'],
                        'format' => 'raw',
                        'value' => function($data){
                            switch ($data->active){
                                case 0 :
                                    return '<span class="badge badge-success">Активная</span>';
                                    break;
                                case 1 :
                                    return '<span class="badge badge-danger">Отключена</span>';
                                    break;

                            }
                        },
                        'filter' => ['0' => 'Активная','1' => 'Отключена',],
                    ],
                    [
                        'format' => 'raw',
                        'headerOptions' => ['style' => 'width:15%'],
                        'value' => function($data){
                            return Html::a('<span class="fas fa-eye"></span>', ['view', 'id'=>$data->id], ['class' => 'btn btn-primary btn-sm'])
                                . Html::a('<span class="fas fa-pencil-alt"></span>', ['update', 'id'=>$data->id], ['class' => 'btn btn-info btn-sm ml-2'])
                                . Html::a('<span class="fas fa-trash"></span>', ['delete', 'id'=>$data->id], ['class' => 'btn btn-danger btn-sm ml-2 mr-1',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],]);
                        }
                    ],
                ],
            ]); ?>

        </div>

    </div>


</div>
