<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\Category;
use app\models\BookSearch;
use app\models\cart\ShoppingCart;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class StoreController extends Controller
{
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex($id = null)
    {	
        $request = Yii::$app->request;
        $items = $request->get('items', 20);
		
        $books = Book::find();
		
        $names = clone $books;
		
        $names = $names->select(['name'])->asArray()->all();
		
        if($id) $books = $books->where(['category' => $id]);
		
        $countQuery = clone $books;
        $pages = new Pagination(['pageSize' => $items, 'totalCount' => $countQuery->count()]);
        $models = $books->offset($pages->offset)
        ->limit($pages->limit)->orderBy('name')
        ->all();

        return $this->render('index', [
            'category' => $id,
            'books' => $models,
            'pages' => $pages,
            'cart' => Yii::$app->cart,
            'names' => $names,
        ]);
    }
	
    public function actionFindBooks()
    {
        $params = Yii::$app->request->queryParams;
		
        if(empty($params['BookSearch']['name'])) $this->redirect(['index']);
		
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($params);
		
        $books = Book::find();
        $names = $books->select(['name'])->asArray()->all();
		
        return $this->render('index', [
            'category' => null,
            'books' => $dataProvider->getModels(),
            'pages' => new Pagination(),
            'cart' => Yii::$app->cart,
            'names' => $names,
            'params' => $params,
        ]);
    }
	
    public function actionAddToCart($id)
    {
        $model = Book::findOne($id);
        $cart = Yii::$app->cart;
		
        if ($model) {
            $cart->put($model, 1);
            return $this->redirect(\yii\helpers\Url::previous());
        }
		
        throw new NotFoundHttpException();
    }
	
    public function actionCart()
    {
        return $this->render('cart', [
            'cart' => Yii::$app->cart,
        ]);
    }
	
    public function actionClearCart()
    {
        $cart = Yii::$app->cart->removeAll();
        return $this->render('cart', [
            'cart' => Yii::$app->cart,
        ]);
    }
	
    public function actionRemoveItem($id)
    {
        $item = Yii::$app->cart->getPositionById($id);
		
        if($item) {
            Yii::$app->cart->remove($item);
        }
		
        return $this->render('cart', [
            'cart' => Yii::$app->cart,
        ]);
    }
	
    public function actionDescribe()
    {
        return $this->render('description');
    }
	
    public function actionDetails($id)
    {
        return $this->renderAjax('details', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
