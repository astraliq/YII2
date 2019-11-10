<?php
/**
 * @var $model \app\models\Activity
 */
$this->title = 'Новое событие';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Новое событие</h1>

<div class="row">
    <div class="col-md-8">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
//                'enableAjaxValidation' => true,
//                'enableClientValidation' => false,
            'options' => ['enctype' => 'multipart/form-data'],
       ]);  ?>
        <?=$form->field($model,'title');?>
        <?=$form->field($model,'description')->textarea();?>
        <?=$form->field($model,'dateStart')?>
        <?=$form->field($model,'isEnding')->checkbox()?>
        <?=$form->field($model,'dateEnd',['enableClientValidation'=>false, 'enableAjaxValidation'=>true])->input('date');?>
        <?=$form->field($model,'isBlocked')->checkbox();?>
        <?=$form->field($model,'isRepeat')->checkbox();?>
        <?=$form->field($model,'repeatType',['enableClientValidation'=>false, 'enableAjaxValidation'=>true])->dropDownList($model::REPEAT_TYPE,['options' =>[ '0' => ['Selected' => true]]]);?>
        <?=$form->field($model,'useNotification')->checkbox();?>
        <?=$form->field($model,'email',['enableClientValidation'=>false, 'enableAjaxValidation'=>true]);?>
        <?=$form->field($model, 'files[]')->fileInput(['multiple' => true,]);?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>