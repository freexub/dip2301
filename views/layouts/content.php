<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
use app\widgets\Alert;
?>
<div class="content-wrapper" style="min-height: 466px;">
    <!-- Content Header (Page header) -->
<!--    <div class="content-header">-->
<!--        <div class="container">-->
<!--            <div class="row mb-2">-->
<!--                <div class="col-sm-6">-->
<!--                    <h1 class="m-0">-->
                        <?php
//                        if (!is_null($this->title)) {
//                            echo \yii\helpers\Html::encode($this->title);
//                        } else {
//                            echo \yii\helpers\Inflector::camelize($this->context->id);
//                        }
                        ?>
<!--                    </h1>-->
<!--                </div>-->
<!--                <div class="col-sm-6">-->
                    <?php
//                    echo Breadcrumbs::widget([
//                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                        'options' => [
//                            'class' => 'breadcrumb float-sm-right'
//                        ]
//                    ]);
                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
        <br>
            <?= Alert::widget() ?>
            <?= $content ?><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
</div>