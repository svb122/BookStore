<?php
/**
 * @package BookStore\controllers
 * @uses yii\web\Controller
 */


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\UserActivRecord;
use yii\filters\AccessControl;

class CountryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'details'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return UserActivRecord::isUser(Yii::$app->user->identity->username);
                        }
                    ],
                    [
                        'actions' => ['details'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return UserActivRecord::isUserAdmin(Yii::$app->user->identity->username);
                        }
                    ],
                ],
            ]
        ];
    }
	
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
		
        $session = Yii::$app->session;
        $session->set('pagelink',$pagination->links['self']);

        $countries = $query->select(['code','name'])->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
	
    public function actionDetails($id)
    {
        $session = Yii::$app->session;
        $page = $session->get('pagelink');
        $session->remove('pagelink');
		
        $query = Country::find();

        $country = $query->select('population')->where(['code' => $id])->one();

        return $this->render('details', ['title'=> $id, 'model' => $country, 'page' => $page]);
    }
	
	
    public function actionHello()
    {
        $query = UserActivRecord::findOne(2);
		$hash = Yii::$app->getSecurity()->generatePasswordHash('userpass');
        $query->password = $hash;
		$query->save();
        return $hash;
    }
}