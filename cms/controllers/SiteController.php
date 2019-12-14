<?php
namespace cms\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use cms\models\Posting;

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
                        'actions' => ['logout', 'index', 'tables', 'dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['site', 'filter'],

                        'allow' => true,
                        'roles' => ['@'],
                    ]
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
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        return $this->render('dashboard');
    }

    public function actionDashboard($flag){
        //validasi start date dan end date
        if($flag == "today"){
            $start_date = date("Y-m-d 00:00:01");
            $end_date = date("Y-m-d 23:59:59" );
        }elseif($flag == "week"){
            $start_date = date('Y-m-d 00:00:01', strtotime("monday this week"));
            $end_date = date('Y-m-d 23:59:59', strtotime("sunday this week"));
        }else{
            $start_date = date("Y-m-01 00:00:01");
            $end_date = date("Y-m-t 23:59:59");
        }

        //create object posting baru
        $posting = new Posting;
        $posting->start_date = $start_date;
        $posting->end_date = $end_date;
        $posting->where_date = "(created_at BETWEEN '".$start_date."' AND '".$end_date."')";
        $countPosting = $posting->countDashboard;
        $hastagData = $posting->countHastag;
        $topActivity = $posting->topActivity;
        $mostComments = $posting->getMostData("comment");
        $mostViewers = $posting->getMostData("viewer");
        $mostLikes = $posting->getMostData("like");
            
       
        return $this->renderAjax('_dashboard_data', [
            'flag' => $flag,
            'count_likes' => $countPosting['likes'],
            'count_comments' => $countPosting['comments'],
            'count_posting' => $countPosting['posting'],
            'count_link' => $countPosting['link'],
            'hastagData' => $hastagData,
            'topActivity' => $topActivity,
            'mostComments' => $mostComments,
            'mostLikes' => $mostLikes,
            'mostViewers' => $mostViewers
        ]);
    }

    public function actionFilter(){
        //validasi start date dan end date
        
        $request = Yii::$app->request;
            // $start_date = date("Y-m-d 00:00:01");
            // $end_date = date("Y-m-d 23:59:59" );
             $start_date=$request->post('date_start').' 00:00:01';
             $end_date=$request->post('date_end').' 23:59:59';

        //create object posting baru
        $posting = new Posting;
        $posting->start_date = $start_date;
        $posting->end_date = $end_date;
        // $posting->where_date = "(created_at>='$start_date' AND created_at<='$end_date')";
        $posting->where_date="";
        if(!empty($start_date) && !empty($end_date)){
            $posting->where_date=$posting->find()->where("created_at>='$start_date' AND created_at<='$end_date'")->all();  
        }elseif(empty($start_date)){
            $posting->where_date=$posting->find()->where("created_at>='$end_date' AND created_at<='$end_date'")->all();
        }elseif(empty($end_date)){
            $posting->where_date=$posting->find()->where("created_at>='$start_date' AND created_at<='$start_date'")->all();
        }
        
       
        $countPosting = $posting->countDashboard;
        $hastagData = $posting->countHastag;
        $topActivity = $posting->topActivity;
        $mostComments = $posting->getMostData("comment");
        $mostViewers = $posting->getMostData("viewer");
        $mostLikes = $posting->getMostData("like");
            
       
        return $this->renderAjax('_dashboard_data', [
            'flag' => "filter",
            'count_likes' => $countPosting['likes'],
            'count_comments' => $countPosting['comments'],
            'count_posting' => $countPosting['posting'],
            'count_link' => $countPosting['link'],
            'hastagData' => $hastagData,
            'topActivity' => $topActivity,
            'mostComments' => $mostComments,
            'mostLikes' => $mostLikes,
            'mostViewers' => $mostViewers
        ]);
    }

    public function actionTables()
    {
        return $this->render('tables');
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
