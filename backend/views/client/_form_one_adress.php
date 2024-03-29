<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientAdress */



?>

<?php $form = ActiveForm::begin(); ?>
<div class="panel-heading " role="tab" id="heading_2">
    <h4 class="panel-title">
        <a role="button"
           data-toggle="collapse"
           href="#collapse_2"
           aria-expanded="true"
           aria-controls="collapse_2"
           class="panel-expand"> <h2>Адрес клиента</h2>
        </a>
    </h4>
</div>

<div id="collapse_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-2">
    <div class="panel-body" data-formLang=2>

        <?= $form->field($model, 'postcode')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'country')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'sity')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'street')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'building')->textInput() ?>

        <?= $form->field($model, 'office')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

