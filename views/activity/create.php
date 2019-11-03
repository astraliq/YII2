<?php
/**
 * @var $model \app\models\Activity
 */
?>
<h1>Новое событие</h1>

<div class="row">
    <div class="col-md-8">
        <?php $form = \yii\bootstrap\ActiveForm::begin();?>
        <?=$form->field($model,'title');?>
        <?=$form->field($model,'description')->textarea();?>
        <?=$form->field($model,'dateStart')->input('date');?>
        <?=$form->field($model,'isEnding')->checkbox()?>
        <?=$form->field($model,'dateEnd')->input('date');?>
        <?=$form->field($model,'isBlocked')->checkbox()?>
        <?=$form->field($model,'isRepeat')->checkbox()?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>