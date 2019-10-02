<?php

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= 'Клиенты' ?></h1>

    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'Id-пользователя',
                'headerOptions' => ['width' => '60'],
            ],
            'login',
            'firstname',
            'lastname',
            'pass',
            [
                'attribute' => 'sex',
                'label' => 'Пол',
                'headerOptions' => ['width' => '100'],
                'filter' => ['' => 'Все', 0 =>'Не указан',1 => 'Мужчина',2 => 'Женщина'],
                'value' => function($model) {
                    switch ($model->sex){
                        case 0: return $model->sex = 'Не указан'; break;
                        case 1: return $model->sex = 'Мужчина'; break;
                        case 2: return $model->sex = 'Женщина'; break;
                    }
                }
            ],
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'dd.MM.YYYY HH:mm'],
                'label' => 'Создано',
                'headerOptions' => ['width' => '100'],
            ],
            'email:email',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'headerOptions' => ['width' => '60'],
            ],
        ],
    ]); ?>


</div>