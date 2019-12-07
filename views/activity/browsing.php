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
                    'rowOptions' => function($model,$index, $grid) {
                        $class=$index%2? 'odd':'even';
                        return ['class'=>$class, 'index'=>$index];
                    },
                    'columns' => [
                            ['class' => \yii\grid\SerialColumn::class],
                        'id',
                        'userId',
                        [
                                'attribute' => 'title',
                            'value' => function($model) {
                                return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['activity/view','id'=>$model->id]);
                            },
                            'format' => 'raw',
                        ],
                        'title',
                        'description',
                        'dateStart',
                        'dateEnd',
                        'isBlocked',
                        'isRepeat',
                        'repeatType',
                        'email',
                        [
                            'attribute' => 'createdAt',
                            'label' => 'Дата создания',
                        ],



                    ]
            ])?>
        </div>
    </div>
</div>
