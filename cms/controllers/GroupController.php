<?php

namespace cms\controllers;

use Yii;
use cms\models\Employee;
use cms\models\Group;
use cms\models\GroupDetail;
use cms\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
             'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => [  'index',
                            'create',
                            'update',
                            'delete',
                            'view'],
            'rules' => [
               
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
               
            ],
        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = Group::find()->all();
          $this->layout = "adminlte";
        return $this->render('index', ['data' => $data]);
       

    }
 public function actionDetail($id)
    {
        $data=GroupDetail::find()
        ->where(['=','id_group',$id])
        ->all();
        // $db= yii::$app->db;
        //  $data= $db->createCommand('SELECT * from group_detail where id_group="'.$id.'"')->queryAll();
        $this->layout = "adminlte";
        return $this->render('detailgroup', [
            'data' => $data
        ]);
    }
   
    public function actionView($id)
    {
            $this->layout = "adminlte";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $this->layout = "adminlte";
    //     $model = new Group();
    //      $db= yii::$app->db;
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id_group]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //         'pegawai' => $pegawai,

    //     ]);
    // }

    /**
     * Updates an existing Group model.
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
            return $this->redirect(['view', 'id' => $model->id_group]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Group model.
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
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
            $this->layout = "adminlte";
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
