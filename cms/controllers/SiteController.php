<?php
namespace cms\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use cms\models\Posting;
use cms\models\PostingSearch;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],

                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
   
     public function actionIndex()
    { 
            $comment_counts= (new \yii\db\Query())
                    ->select(['*'])
                    ->from('posting_detail')
                    ->leftjoin('posting','posting.id_posting=posting_detail.id_posting')
                    ->where('posting.type_posting=1')
                    ->orderBy('posting.comment_count desc')
                    ->limit(3)
                    ->all();
            $like_counts= (new \yii\db\Query())
                    ->select(['*'])
                    ->from('posting_detail')
                    ->leftjoin('posting','posting.id_posting=posting_detail.id_posting')
                    ->where('posting.type_posting=1')
                    ->orderBy('posting.like_count desc')
                    ->limit(3)
                    ->all();
            $views_counts= (new \yii\db\Query())
                    ->select(['*'])
                    ->from('posting_detail')
                    ->leftjoin('posting','posting.id_posting=posting_detail.id_posting')
                    ->where('posting.type_posting=1')
                    ->orderBy('posting.views_count desc')
                    ->limit(3)
                    ->all();
            $sql = Posting::find()->all();
            // $sql= $db->createCommand('SELECT caption from Posting')->queryAll();
            $i=0;
            foreach ($sql as $row)
            {
                $hasil[$i]= $row['caption'];
                $i++;
            }
            $count =Posting::find()->count(); 
            // $db->createCommand('SELECT caption from Posting')->execute();
            $bil= 0;
            for($j =0 ; $j<=$count-1; $j++ )
             {
              
                preg_match_all("/(#\w+)/u", $hasil[$j], $matches);
                $output[$j] = $matches[0];
                $output[$j] = array_map('strtolower', $output[$j]);
                $output2[$j]=array_unique($output[$j]);
                sort($output2[$j]);
                $jml=count($output2[$j]);
                for($m = 0 ; $m < $jml ; $m++ )
                {
                
                $akhir[$bil] = $output2[$j][$m];
                $bil++;

                }       
             }
             $count_values = array_count_values($akhir);
            
                arsort($count_values);
            
        $db= yii::$app->db;
        $searchModel = new PostingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = "adminlte";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'coba' => $count_values,
            'by_comments'=> $comment_counts,
            'by_likes'=> $like_counts,
            'by_views'=> $views_counts

        ]);
    
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
