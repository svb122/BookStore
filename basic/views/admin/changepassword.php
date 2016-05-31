<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Change Password','url' => ['admin/changepassword', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-changepassword">
    <h1>Change Password</h1>
    
    <p>Please fill out the following fields to change password :</p>
    
    <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'enableAjaxValidation' => true,
        'options'=>['class'=>'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>
        <?= $form->field($model,'oldpass',['inputOptions'=>[
            'placeholder'=>'Old Password'
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>'New Password'
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>'Repeat New Password'
        ]])->passwordInput() ?>
        
        <div class="form-group">
            <div class="col-xs-8 col-md-9 col-lg-10">
                <?= Html::submitButton('Change password',['class' => 'btn btn-primary']) ?>
            </div>
			
            <div class="col-xs-4 col-md-3 col-lg-2">
                <?= Html::button('Cancel', ['class' => 'cancel btn btn-default']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>