<?php

use app\traits\DropDown;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
?>


<div class="panel-heading validation-box" role="tab" id="heading_1">
    <h4 class="panel-title">
        <a role="button"
           data-toggle="collapse"
           href="#collapse_1"
           aria-expanded="true"
           aria-controls="collapse_1"
           class="panel-expand"> Данные клиента
        </a>
    </h4>
</div>

<div id="collapse_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
    <div class="panel-body" data-formLang=1>


        <?= $form->field($model, 'login')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'pass')->passwordInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'firstname')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'lastname')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'sex')->dropDownList(DropDown::status()) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => false]) ?>
    </div>

</div>
