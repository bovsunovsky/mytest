<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientAdress */



?>


<div class="panel-heading " role="tab" id="heading_2">
    <h4 class="panel-title">
        <a role="button"
           data-toggle="collapse"
           href="#collapse_2"
           aria-expanded="true"
           aria-controls="collapse_2"
           class="panel-expand"> Адресс клиента
        </a>
    </h4>
</div>

<div id="collapse_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-2">
    <div class="panel-body" data-formLang=2>

        <?php if($update) : ?>
        <div class="client-adress-view">

            <!--    <div class="client-index">-->

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'parent_id',
                    'postcode',
                    'country',
                    'sity',
                    'street',
                    'building',
                    'office',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url,$model_adress) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open"></span>',
                                    (Url::toRoute('client-adress/view?id='. $model_adress->id)));
                            },
                            'update' => function ($url,$model_adress) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-pencil"></span>',
                                    (Url::toRoute('client-adress/update?id='. $model_adress->id)));
                            },
                            'delete' => function ($url,$model_adress) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-trash"></span>',
                                    (Url::toRoute('client-adress/delete?id='. $model_adress->id)));
                            },

                        ],
                    ],
                ],
            ]); ?>


            <!--    </div>-->
        </div>
        <?php endif; ?>
        <?php if(!$update) : ?>
        <?= $form->field($model, 'postcode')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'country')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'sity')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'street')->textInput(['maxlength' => false]) ?>

        <?= $form->field($model, 'building')->textInput() ?>

        <?= $form->field($model, 'office')->textInput() ?>
        <?php endif; ?>


    </div>
</div>

