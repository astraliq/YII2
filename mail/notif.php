<?php


?>


<h3><?= $model->title ?></h3>
<p><b>Описание: </b><?= $model->description ?></p>
<p><b>Дата создания: </b></p><span id="date_start_newaction"><?= $model->dateStart ?></span>
<?php
//if (!empty($model->files)) {
//    echo '<p><b>Изображения: </b></p>';
//    foreach ($filesNames as $file) {
//        echo '<img width="200" src="' . Yii::getAlias('@filesWeb/' . $file) . '">';
//    }
//} else {
//    echo '<p>Изображений нет. </p>';
//}
//?>
