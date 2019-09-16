<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientAdress */

$this->title = 'Create Client Adress';
$this->params['breadcrumbs'][] = ['label' => 'Client Adresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-adress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_one_adress', [
        'model' => $model_adress,
    ]) ?>

</div>