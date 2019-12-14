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
use yii\filters\AccessControl;

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
            'class' => AccessControl::className(),
            'only' => ['index','create','update','delete','view','like','comment','trending','posting','list','filter'],
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
        $data = Posting::find()->orderBy('views_count desc')->all();

        return $this->render('index', [
            'data' => $data,
        ]);
    }

     public function actionPosting()
    {
        return $this->render('listposting');
    }
    public function actionList()
    {
       $data = Posting::find()->orderBy('created_at desc')->all();

        return $this->renderAjax('_listposting', ['data' => $data,]);
    }
    public function actionFilter()
    {
        $request = Yii::$app->request;
        // $start_date = date("Y-m-d 00:00:01");
        // $end_date = date("Y-m-d 23:59:59" );
         $tag=$request->post('tag');
         $start_date=$request->post('start_date');
         $end_date=$request->post('end_date');
         $data_tag=explode('#',$tag);
         $where="";
         for($i=1;$i<count($data_tag);$i++){
            if($i<count($data_tag)-1){
                $where.=" caption like '%".$data_tag[$i]."%' and";
            }else{
                $where.=" caption like '%".$data_tag[$i]."%'";
            }
         }
         if(empty($start_date) && empty($end_date)){
            $where.="";
         }else if(!empty($start_date) && !empty($end_date)){
            $where.=" and (created_at>='$start_date' and created_at<='$end_date')";
         }else if(empty($start_date)){
            $where.=" and (created_at>='$end_date' and created_at<='$end_date')";
         }else if(empty($end_date)){
            $where.=" and (created_at>='$start_date' and created_at<='$start_date')";
         }
         
         $result = Posting::find()->where($where)->orderBy('created_at desc')->all();
         return $this->renderAjax('_listposting', ['data' => $result,]);
    }

     
    public function actionLike()
    {
        $data = Posting::find()->orderBy('like_count desc')->all();

        return $this->render('like', [
            'data' => $data,
        ]);
    }

    public function actionComment()
    {
        $data = Posting::find()->orderBy('comment_count desc')->all();

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
     
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
     public function actionDetail($id)
    {
        
        $data = Posting::findOne($id);

        return $this->render('detailposting', [
            'data' => $data
        ]);
    }

     public function actionListlike($id)
    {
       $data=PostingComment::find()
           ->where(['=','id_posting',$id])
           ->all();
         
        return $this->render('listlike', [
            'data' => $data,
        ]);
    }
     public function actionListcomment($id)
    {
    $data=PostingComment::find()
           ->where(['=','id_posting',$id])
           ->all();
            
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
        
        if (($model = Posting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
