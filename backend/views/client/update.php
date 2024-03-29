<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $model app\models\ClientAdress */


$this->title = 'Update Client: ' . $model_client->id;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model_client->id, 'url' => ['view', 'id' => $model_client->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php $form = ActiveForm::begin(); ?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel-action">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                <hr>
            </div>
        </div>
        <div class="w-100 d-none d-md-block"></div>
        <div class="col-6">
            <div class="panel panel-default">
                <?= $this->render('@backend/views/client/_formclient', [ 'model' => $model_client , 'form'=> $form]) ?>
            </div>
        </div>
            <div class="col-4">
                <div class="panel panel-default">
                    <?= $this->render('@backend/views/client/_formadress', [
                            'model' => $model_adress,
                            'form'=> $form,
                            'update' => true ,
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider]) ?>

                </div>
            </div>
    </div>
</div>
<?php ActiveForm::end(); ?>