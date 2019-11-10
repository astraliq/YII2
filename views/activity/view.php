<?php


?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Событие создано</h1>
        <div class="col-md-3" id="calendar_block">
            <h3><?= $model->title ?></h3>
            <p><b>Описание: </b><?= $model->description ?></p>
            <p><b>Дата создания: </b></p><span id="date_start_newaction"><?= $model->dateStart ?></span>
            <p><b>Изображения: </b></p>
            <?php foreach ($model->files as $file) {
                echo '<img width="200" src="' . Yii::getAlias('@filesWeb/'.$file) . '">';
            } ?>

        </div>
    </div>
</div>
