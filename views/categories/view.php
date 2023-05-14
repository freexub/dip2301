<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap4\Breadcrumbs;

/** @var yii\web\View $this */
/** @var app\models\Categories $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<?php if (!empty($this->params['breadcrumbs'])): ?>
    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
<?php endif ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h5 class="modal-title" id="exampleModalLabel">Добавление предмета в категорию</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->render('items/_form_add', ['model' => $model_item]); ?>
            </div>
        </div>
    </div>
</div>
<div class="categories-view">

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title text-xl"><?= Html::encode($this->title) ?></h3>
            <div class="card-tools">
                <?= Html::a('<span class="fas fa-plus "></span> Добавить', ['add'], ['class' => 'btn btn-success bg-olive', 'data-toggle' => 'modal', 'data-target' => '#exampleModal']) ?>
            </div>
        </div>

        <div class="card-body">
            <?php  echo $this->render('items/_search', ['model' => $searchModel]); ?>
        </div>

        <div class="card-footer">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'showHeader' => false,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'headerOptions' => ['style' => 'width:90%'],
                        'format' => 'raw',
                        'attribute' => 'name',
                        'value' => function($data){
                            return $data->name;
                        }
                    ],
//                    [
//                        'attribute' => 'active',
////                'headerOptions' => ['style' => 'width:5%'],
//                        'format' => 'raw',
//                        'value' => function($data){
//                            switch ($data->active){
//                                case 0 :
//                                    return '<span class="badge badge-success float-right">Активный</span>';
//                                    break;
//                                case 1 :
//                                    return '<span class="badge badge-danger float-right">Отключен</span>';
//                                    break;
//
//                            }
//                        },
//                        'filter' => ['0' => 'Активная','1' => 'Отключена',],
//                    ],
                    [
                        'format' => 'raw',
                        'headerOptions' => ['style' => 'width:15%'],
                        'value' => function($data){
                            return  Html::a('<span class="fas fa-pencil-alt"></span>', ['/items-list/update', 'id'=>$data->id], ['class' => 'btn btn-info btn-sm ml-2 float-right'])
                                . Html::a('<span class="fas fa-trash"></span>', ['/items-list/delete', 'id'=>$data->id], ['class' => 'btn btn-danger btn-sm ml-2 float-right',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],])
                                . Html::a('<b>Открыть</b>', ['/items-list/view', 'id'=>$data->id], ['class' => 'btn btn-primary btn-sm ml-2  float-right']);
                        }
                    ],
                ],
            ]); ?>
        </div>

    </div>

</div>
