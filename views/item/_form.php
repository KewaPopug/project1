<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Item $model */
/** @var app\models\Item $modelCabinet */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\widgets\ActiveForm $categories */
/** @var yii\widgets\ActiveForm $corps */
/** @var yii\widgets\ActiveForm $cabinets */
/** @var yii\widgets\ActiveForm $users */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList(ArrayHelper::map($categories, 'id', 'category'),
        [
            'prompt' => 'Select category ...',
        ])
        ->label('Категория') ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true])->label('Статус') ?>

    <?= $form->field($model, 'name_item')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'number_item')->textInput(['maxlength' => true])->label('Инвентаризационный номер') ?>

    <?= Html::label('Корпус', 'corps', ['class' => 'control-label']) ?>
    <?= Html::dropDownList('corps', '',
        ArrayHelper::map($corps, 'id', 'corps'),
        [
            'prompt' => 'Select corp ...',
            'class' => 'form-control',
            'id' => 'corps',
            'onchange' => '
                 $.post(
                    "' . Url::toRoute('cabinets') . '",
                    {id: $(this).val()},
                    function(data){
                      $("select#item-cabinet_id").html(data).attr("disabled", false);
                    }
                  );
                ',
        ]); ?>


    <?= $form->field($model, 'cabinet_id')
        ->dropDownList(
                [],
            [
                'prompt' => 'Select cabinet ...',
            ]
        )
        ->label('Кабинет') ?>

    <?php if(\Yii::$app->user->can('admin_access') && !$model->isNewRecord):?>
            <?= $form->field($model, 'user_id')->dropDownList(
                ArrayHelper::map($users, 'id', 'username'),
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите пользователя для замены',
                ])->label('Пользователь'); ?>
        </div>
    <?php endif;?>

    <div class="form-group field-item-cabinet_id required">

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
