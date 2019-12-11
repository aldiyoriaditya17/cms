<?php
namespace serviceism\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use serviceism\models\ApiUser;
use serviceism\models\Employee;
use serviceism\helpers\Helper;

/**
 * Employee controller
 */
class EmployeeController extends Controller
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

   
    public function actionList(){

        $request = Yii::$app->request;
        $offset = Yii::$app->request->getQueryParam('offset');
        $headers = Yii::$app->request->headers;
        $limit = 10;

        $data = Employee::find()->where(['!=','person_id',$headers['token']])
                ->limit($limit)
                ->offset($offset)
                ->all();
        $newData = [];

        foreach ($data as $key => $value) {
            $h1['personid'] = $value->person_id;
            $h1['nik'] = $value->nik;
            $h1['nama'] = $value->nama;
            $h1['selected'] = 0;
            $newData[] = $h1;
        }

        if($data){
            $response['code']=200;
            $response['message']="data found.";
            $response['data']=$newData;
            return $response;
        }else{
            Yii::$app->response->statusCode = 404;
            $response['code']=404;
            $response['message']="data found.";
            $response['data']=[];
            return $response;
        }

    }
}
