<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ItemsList $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
<div class="items-list-view">
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?=$model->name . ' / <span class="float-right text-sm">00000'.$model->id.'</span>' ?></h3>
                    <div class="col-12">
                        <img src="<?=Yii::getAlias( '@web' )?>/items_photo/<?=$model->photo?>" class="product-image" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?=$model->name?></h3>
                    <p><?=$model->about?></p>
                    <hr>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            <?=$model->price?> тг.
                        </h2>
                        <h4 class="mt-0">
                            <small>Балансовая стоимость: <?=($model->price-($model->price/100*10))?> тг. </small>
                        </h4>
                    </div>
                    <div class="mt-4 product-share">
                        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger float-right',
                            'data' => [
                                'confirm' => 'Вы уверены? Вы пытаетесь удалить данный предмет из базы данных ИС Склад!',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right']) ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Информация</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'name',
                                'about:ntext',
                                'photo',
                                'active',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
