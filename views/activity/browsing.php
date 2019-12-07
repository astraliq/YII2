<?php

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Календарь событий</h1>
        <div class="col-md-3" id="calendar_block">

        </div>
        <div class="col-md-12">

            <?= \yii\grid\GridView::widget([
                    'dataProvider' => $provider,

            ])?>
        </div>
    </div>
</div>
