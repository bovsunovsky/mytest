<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = $model_client->id;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Вeрнуться', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model_client->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добавить адресс', ['add', 'id' => $model_client->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model_client->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model_client,
        'attributes' => [
            'id',
            'login',
            'pass',
            'firstname',
            'lastname',
            'sex',
            'created_at',
            'email:email',
        ],
    ]) ?>

</div>
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