<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UserActivRecord;
use app\models\PasswordForm;
use app\models\UploadForm;
use app\models\userEditForm;
use app\models\AddUserform;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public $layout = 'admin';
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    /*[
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return UserActivRecord::isUser(Yii::$app->user->identity->username);
                        }
                    ],*/
                    [
                        'actions' => ['index', 'create', 'details', 'delete', 'update', 'changepassword'],
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
        $query = UserActivRecord::find();

        $users = $query->orderBy('username')->all();
		
        $model = new userEditForm();
		
        foreach($users as $user)
            if($user->roleId == UserActivRecord::ROLE_ADMIN) $user->roleId = 'admin';
            elseif($user->roleId == UserActivRecord::ROLE_USER) $user->roleId = 'user';

        return $this->render('index', [
            'users' => $users,
            'model' => $model
        ]);
    }
	
    public function actionCreate()
    {
        $model = new AddUserform();
        $modeluser = new UserActivRecord();
		
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
		
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $modeluser->username = $model->username;
            $modeluser->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $modeluser->roleId = $model->role;
            $modeluser->save();
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('add', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionDetails($id)
    {
        $user = UserActivRecord::findOne($id);

        return $this->renderAjax('details', ['title'=> $user->username, 'model' => $user]);
    }
	
    public function actionDelete($id, $confirm = true)
    {
        if($confirm){
            return $this->renderAjax('delete', [
                'id' => $id
            ]);
        }else{
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }
	
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'title'=> $model->username,
                'model' => $model,
            ]);
        }
    }
	
    public function actionChangepassword($id){
        $model = new PasswordForm($id);
        $modeluser = UserActivRecord::findOne($id);
		
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
		
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $modeluser->password = Yii::$app->getSecurity()->generatePasswordHash($model->newpass);
            $modeluser->save();
            return $this->redirect(['index']);
        }
        else{
            return $this->renderAjax('changepassword',[
                'model' => $model,
                'title' => $modeluser->username
            ]);
        }
    }
	
    protected function findModel($id)
    {
        if (($model = UserActivRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}