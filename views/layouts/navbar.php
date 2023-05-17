<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-olive">
    <div class="container">
        <a href="/" class="navbar-brand">
            <span class="brand-text font-weight-light">ИС Склад</span>
        </a>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            </li>
            <?php if (!Yii::$app->user->isGuest){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/profiles/">Профайлы</a>
                        <a class="dropdown-item" href="/admin/profiles-type/">Типы профайлов</a>
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="/admin/list-class/">Классы</a>-->
<!--                        <a class="dropdown-item" href="/admin/class-type/">Типы классов</a>-->
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <?php if(Yii::$app->user->isGuest) { ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/site/login" class="nav-link">Вход</a>
                </li>
            <?php }else{
                echo '<li class="nav-item">';
                echo Html::beginForm(['/site/logout']);
                echo Html::submitButton('Выход (' . Yii::$app->user->identity->username . ')', ['class' => 'nav-link btn btn-link logout']);
                echo Html::endForm();
                echo '</li>';
            } ?>
        </ul>
    </div>
</nav>
<!-- /.navbar -->