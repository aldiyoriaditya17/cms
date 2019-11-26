<?php

namespace backend\controllers;

use Yii;
use backend\models\Posting;
use backend\models\PostingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostingController implements the CRUD actions for Posting model.
 */
class PostingController extends Controller
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
     * Lists all Posting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $db= yii::$app->db;
        $data= $db->createCommand('SELECT * from Posting order by views_count asc')->queryAll();
        $searchModel = new PostingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = "adminlte";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
          
        ]);
    }

    public function actionLike()
    {
        $db= yii::$app->db;
        $data= $db->createCommand('SELECT * from Posting order by like_count asc')->queryAll();
        $searchModel = new PostingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = "adminlte";
        return $this->render('like', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
          
        ]);
    }

    public function actionComment()
    {
        $db= yii::$app->db;
        $data= $db->createCommand('SELECT * from Posting order by comment_count asc')->queryAll();
        $searchModel = new PostingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = "adminlte";
        return $this->render('comment', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
          
        ]);
    }

    /**
     * Displays a single Posting model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
          $this->layout = "adminlte";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
   
    /**
     * Creates a new Posting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
          $this->layout = "adminlte";
        $model = new Posting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_posting]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
          $this->layout = "adminlte";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_posting]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
          $this->layout = "adminlte";
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
          $this->layout = "adminlte";
        if (($model = Posting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
