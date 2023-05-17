<?php

/** @var yii\web\View $this */

$this->title = 'Склад';
?>
<div class="container">
    <div class="site-index">

        <div class="jumbotron text-center bg-transparent">
            <h1 class="display-4">Добро пожаловать в ИС Склад!</h1>

            <p class="lead">Информационная система позволяет организовать товары или услуги по категориям.</p>

        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-3">
                    <div class="card bg-dark d-flex flex-fill "><a href="items-list/index" class="btn btn-default bg-gradient-olive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center"><span class="fa fa-cart-arrow-down fa-5x "></span></div>
                                    <div class="col-12 text-center">
                                        <b class="text-lg">СКЛАД</b>
                                    </div>
                                </div>
                            </div>
                    </div></a>
                </div>
                <div class="col-lg-3">
                    <div class="card bg-dark d-flex flex-fill "><a href="categories/index" class="btn btn-default bg-teal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center"><span class="fa fa-th-list fa-5x"></span></div>
                                    <div class="col-12 text-center">
                                        <b class="text-lg">КАТЕГОРИИ</b>
                                    </div>
                                </div>
                            </div>
                    </div></a>
                </div>
                <div class="col-lg-3">
                    <div class="card bg-dark d-flex flex-fill "><a href="items-list/report" class="btn btn-default bg-cyan">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center"><span class="fa fa-file fa-5x"></span></div>
                                    <div class="col-12 text-center">
                                        <b class="text-lg">ОТЧЁТ</b>
                                    </div>
                                </div>
                            </div>
                    </div></a>
                </div>
                <div class="col-lg-3">
                    <div class="card bg-dark d-flex flex-fill "><a href="admin/profiles/" class="btn btn-default bg-blue">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-center"><span class="fa fa-users fa-5x"></span></div>
                                    <div class="col-12 text-center">
                                        <b class="text-lg">СОТРУДНИКИ</b>
                                    </div>
                                </div>
                            </div>
                    </div></a>
                </div>


            </div>

        </div>
    </div>
</div>
