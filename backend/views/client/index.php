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
//                'class' => DataColumn::className(), // Не обязательно
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'Id-пользователя',
                'headerOptions' => ['width' => '60'],
            ],
            'login',
            'firstname',
            'lastname',
            'pass',
            //'sex',
            //'created_at',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'headerOptions' => ['width' => '60'],
            ],
        ],
    ]); ?>


</div>