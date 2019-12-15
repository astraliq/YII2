<?php

/* @var $this yii\web\View */

$this->title = 'MyTask';
$today= new DateTime('now');
$todayHref = 'day=' . $today->format('d') . '&month=' . $today->format('m') . '&year=' . $today->format('Y')
?>
<div class="site-index">

    <div class="col-md-12">
        <p class="main_menu">
            <a class="btn btn-lg btn-warning" href="/activity/view-all">Календарь событий</a>
            <a class="btn btn-lg btn-warning" href="/activity/view-all?<?=$todayHref?>">Сегодня</a>
        </p>
    </div>
    <div class="jumbotron">

        <h1>Добро пожаловать в <?= $this->title ?>!</h1>
        <h2>Чтобы создать первое событие нажмите на кнопку</h2>

        <p><a class="btn btn-lg btn-success" href="/activity/create">Создать событие</a></p>

    </div>

    <div class="body-content">


        </div>

    </div>
</div>
