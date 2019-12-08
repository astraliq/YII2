<?php
$filesNames = explode('|',$model->files);


?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center"><?= $pageTitle?></h1>
        <div class="col-md-12" id="calendar_block">
        </div>

        <div class="col-md-12 activity_block">
            <?= \yii\helpers\Html::a('Изменить событие',['activity/change','id'=>$model->id],['class'=>'btn btn-sm btn-success']);?>
            <?php
                if ($admin) {
                    if ($model->deleted === 1) {
                        echo \yii\helpers\Html::a('Снять пометку на удаление',['activity/restore','id'=>$model->id],['class'=>'btn btn-sm btn-success']);
                    } else {
                        echo yii\helpers\Html::a('Пометить на удаление событие', ['activity/del', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning']);
                    }
                    echo \yii\helpers\Html::a('Удалить событие из базы',['activity/fulldel','id'=>$model->id],['class'=>'btn btn-sm btn-danger']);
                } else {
                    echo \yii\helpers\Html::a('Удалить событие', ['activity/del', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger']);
                }
            ?>
            <h3><?= $model->title ?></h3>
            <p><b>Описание: </b><?= $model->description ?></p>
            <p><b>Дата создания: </b></p><span id="date_start_newaction"><?= $model->dateStart ?></span>
            <?php
            if (!empty($model->files)) {
                echo '<p><b>Изображения: </b></p>';
                foreach ($filesNames as $file) {
                    echo '<img width="200" src="' . Yii::getAlias('@filesWeb/' . $file) . '">';
                }
            } else {
                echo '<p>Изображений нет. </p>';
            }
            ?>
        </div>
    </div>
</div>
