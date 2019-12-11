<?php

namespace cms\controllers;

use Yii;
use cms\models\Posting;
use cms\models\PostingComment;
use cms\models\PostingLike;
use cms\models\PostingSearch;
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

            'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => [  'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                            'like',
                            'comment',
                            'trending'],
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
     * Lists all Posting models.
     * @return mixed
     */
    public function actionIndex()
    {
         $data=Posting::find()
        ->orderBy('views_count desc')
        ->all();
        $this->layout = "adminlte";
        return $this->render('index', [
            'data' => $data,
          
        ]);
    }

     public function actionPosting()
    {
       $data= (new \yii\db\Query())
                    ->select(['*'])
                    ->from('posting_detail')
                    ->leftjoin('posting','posting.id_posting=posting_detail.id_posting')
                    ->orderBy('posting.created_at desc')
                    ->limit(3)
                    ->all();
        $this->layout = "adminlte";
        return $this->render('listposting', [
            'data' => $data,
        ]);
    }

     
    public function actionLike()
    {
         $data=Posting::find()
        ->orderBy('like_count desc')
        ->all();
        $this->layout = "adminlte";
        return $this->render('like', [
            'data' => $data,
          
        ]);
    }

    public function actionComment()
    {
         $data=Posting::find()
        ->orderBy('comment_count desc')
        ->all();
        $this->layout = "adminlte";
        return $this->render('comment', [
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
     public function actionDetail($id)
    {
        
        $db= yii::$app->db;
         $data= $db->createCommand('SELECT * from Posting_detail join posting on posting.id_posting=posting_detail.id_posting where posting_detail.id_posting="'.$id.'"')->queryAll();
        $this->layout = "adminlte";
        return $this->render('detailposting', [
            'data' => $data
        ]);
    }

     public function actionListlike($id)
    {
       $data=PostingComment::find()
           ->where(['=','id_posting',$id])
           ->all();
          $this->layout = "adminlte";
        return $this->render('listlike', [
            'data' => $data,
        ]);
    }
     public function actionListcomment($id)
    {
    $data=PostingComment::find()
           ->where(['=','id_posting',$id])
           ->all();
             $this->layout = "adminlte";
        return $this->render('listcomment', [
            'data' => $data,
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
