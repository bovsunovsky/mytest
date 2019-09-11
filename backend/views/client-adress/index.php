<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientAdressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Adresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-adress-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client Adress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            //'street',
            //'building',
            //'office',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>