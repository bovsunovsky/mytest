<?php

namespace backend\controllers;

use app\models\ClientAdressSearch;
use Yii;
use app\models\Client;
use app\models\ClientAdress;
use app\models\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Faker\Factory;
use app\traits\DropDown;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Client models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchAdressModel = new ClientAdressSearch();
        $dataAdressProvider = $searchAdressModel->searchClient(Yii::$app->request->queryParams, $id);
        $dataAdressProvider->pagination->pageSize = 5;

        $models = $this->findModel($id);
        return $this->render('view', [
            'model_client' => $models['client'],
            'model_adress' => $models['ClientAdress'],
            'searchModel' => $searchAdressModel,
            'dataProvider' => $dataAdressProvider,
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_client = new Client();
        $model_adress = new ClientAdress();
        $model_client->created_at = date("Y-m-d H:i:s");
        if(Yii::$app->request->post())
        {

            if (($model_client->load(Yii::$app->request->post()) && $model_client->save()) &&
                ($model_adress->parent_id = $model_client->id) &&
                ($model_adress->load(Yii::$app->request->post()) && $model_adress->save()))
            {
                return $this->redirect(['view', 'id' => $model_client->id]);
            }
        }

        return $this->render('create', [
            'model_client' => $model_client,
            'model_adress' => $model_adress,
        ]);
    }

    public function actionAdd( $id)
    {
        $model_adress = new ClientAdress();
        $model_adress->parent_id = $id;
        if(Yii::$app->request->post())
        {
            if ($model_adress->load(Yii::$app->request->post()) && $model_adress->save())
            {
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('add_adress', [
            'model_adress' => $model_adress,
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $models = $this->findModel($id);
        $searchAdressModel = new ClientAdressSearch();
        $dataAdressProvider = $searchAdressModel->searchClient(Yii::$app->request->queryParams, $id);
        $dataAdressProvider->pagination->pageSize = 5;

        if(Yii::$app->request->post())
        {
            if (($models['client']->load(Yii::$app->request->post()) && $models['client']->save())) {
                return $this->redirect(['view', 'id' => $models['client']->id]);
            }
        }
        return $this->render('update', [
            'model_client' => $models['client'],
            'model_adress' => $models['ClientAdress'],
            'searchModel' => $searchAdressModel,
            'dataProvider' => $dataAdressProvider,
        ]);
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Client::findOne($id)) Client::findOne($id)->delete();
        if(ClientAdress::findAll(['parent_id' => $id])) ClientAdress::deleteAll(['parent_id' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $models = [];
        if ((Client::findOne($id)) !== null)
        {
            $models['client'] = Client::findOne($id) ;

        if ((ClientAdress::findAll(['parent_id' => $id])) !== null)
        {
            $models['ClientAdress'] = ClientAdress::findAll(['parent_id' => $id]) ;
        }
        return $models;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGenerate()
    {
        $faker = Factory::create();

        for($i = 0; $i < 100; $i++)
        {
            $client = new Client();
            $client->login = $faker->text(10);
            $client->pass = $faker->text(10);
            $client->firstname = $faker->text(10);
            $client->lastname = $faker->text(10);
            $client->sex = $faker->numberBetween(0,2);
//            $client->created_at = $faker->unixTime();
            $client->created_at = $faker->dateTime()->format('HH:mm:ss dd.MM.YYYY');
            $client->email = $faker->email();

            $k = rand(1,5);
            for ($j=0; $j < $k ; $j++)
            {
                $adress = new ClientAdress();
                $adress->parent_id = $i;
                $adress->postcode = $faker->numberBetween(4 , 32);
                $adress->country = $faker->countryCode;
                $adress->sity = $faker->text(10);
                $adress->street = $faker->text(10);
                $adress->building = $faker->numberBetween(1, 100);
                $adress->office = $faker->numberBetween(1, 999);
                $adress->save(false);

            }
            $client->save(true);
        }
        die('Data generation is complete!');
    }
}