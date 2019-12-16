<?php

?>
<div class="row">
    <div class="col-md-14">
        <h1 class="text-center">Календарь событий</h1>
        <div class="col-md-12" id="calendar_block">
        </div>
        <div class="col-md-14">
            <?= \yii\grid\GridView::widget([
                    'dataProvider' => $provider,
                    'rowOptions' => function($model,$index, $grid) {
                        $class=$index%2? 'odd':'even';
                        return ['class'=>$class, 'index'=>$index];
                    },
                    'columns' => [
                            ['class' => \yii\grid\SerialColumn::class],
                        [
                            'attribute' => 'id',
                            'visible' => $admin,
                        ],
                        [
                            'attribute' => 'userId',
                            'visible' => $admin,
                        ],
                        [
                                'attribute' => 'title',
                            'value' => function($model) {
                                return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['activity/view','id'=>$model->id]);
                            },
                            'format' => 'raw',
                        ],
                        [
                                'attribute' => 'user.email',
                            'label' => 'Email пользователя',
                        ],
                        'description',
                        'dateStart',
                        [
                            'attribute' => 'dateEnd',
                            'visible' => !$admin,
                        ],
                        'isBlocked',
                        'isRepeat',
                        'repeatType',
                        [
                            'attribute' => 'deleted',
                            'visible' => $admin,
                            'label' => 'Удалено',
                        ],
                        [
                            'attribute' => 'email',
                            'label' => 'Email оповещений',
                        ],
//                        [
//                            'attribute' => 'createdAt',
//                            'label' => 'Дата создания',
//                        ],
                    ]
            ])?>
        </div>
    </div>
</div>
