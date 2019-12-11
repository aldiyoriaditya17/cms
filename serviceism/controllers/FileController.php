<?php
namespace serviceism\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use serviceism\models\ApiUser;
use serviceism\models\Employee;
use serviceism\models\Group;
use serviceism\models\GroupDetail;
use serviceism\helpers\Helper;
use serviceism\helpers\AttachmentFile;

/**
 * File controller
 */
class FileController extends Controller
{
	public function beforeAction($action)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->controller->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
       
        return [
            'basicAuth' => [
                'class' => \yii\filters\auth\HttpBasicAuth::className(),
                'auth' => function ($username, $password) {
                    return ApiUser::authenticateLogin($username, $password);
                },
            ],
        ];
        
    }

	public function actionGet()
	{
		$request = Yii::$app->request;
        $raw = json_decode($request->getRawBody());

        $group = Group::find()->where(['=','id_group',$raw->group_id])
                ->one();

        if($group){

        	 header('Content-Type:'.$group['file_type']); 
        	 echo base64_decode($group['file_content']);
        	 exit();

        }else{
        	throw new \yii\web\NotFoundHttpException;
        }

       
	}
}