<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ItemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    <?//= $form->field($model, 'id') ?>-->

<!--    <?//= $form->field($model, 'category_id') ?>-->

<!--    <?//= $form->field($model, 'user_id') ?>-->

<!--    <?//= $form->field($model, 'status') ?>-->

<!--    <?//= $form->field($model, 'name_item') ?>-->

    <?php  echo $form->field($model, 'number_item')->label("Номер предмета") ?>

    <?php // echo $form->field($model, 'cabinet_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<!--        <?//= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
