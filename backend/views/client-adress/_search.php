<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientAdressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-adress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'postcode') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'sity') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'building') ?>

    <?php // echo $form->field($model, 'office') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>