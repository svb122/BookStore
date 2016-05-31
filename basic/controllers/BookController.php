<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\UploadForm;
use app\models\BookSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    public $layout = 'admin';
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'update-image', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \app\models\UserActivRecord::isUser(Yii::$app->user->identity->username);
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();
        $filemodel = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
            $filemodel->file = UploadedFile::getInstance($filemodel, 'file');
			
            if($filemodel->upload()){
                $model->imgsrc = $filemodel->src;
                if($model->save()) return $this->redirect(['index']);
            }
            
        }
		
        return $this->render('create', [
            'model' => $model,
            'file' => $filemodel,
        ]);
    }
	
    public function actionUpdateImage($id)
    {
        $model = $this->findModel($id);
        if(file_exists(\yii\helpers\Url::to($model->imgsrc))) unlink(\yii\helpers\Url::to($model->imgsrc));
        $filemodel = new UploadForm();
		
        if ($filemodel->load(Yii::$app->request->post())) {
            $filemodel->file = UploadedFile::getInstance($filemodel, 'file');
			
            if($filemodel->upload()){
                $model->imgsrc = $filemodel->src;
                if($model->save(false)) return $this->redirect(['view', 'id' => $model->id]);
            }
        }
		
        return $this->render('update-image', [
            'model' => $model, 'temp' => $filemodel->src,
            'file' => $filemodel,
        ]);	
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
