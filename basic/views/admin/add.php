<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = "Add user";
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'add-form',
    'enableAjaxValidation' => true,
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8 col-lg-offset-4\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-4 control-label'],
    ],
]); ?>

    <?= $form->field($model, 'username', ['inputOptions' => ['placeholder' => 'Username']]);?>
    <?= $form->field($model, 'role')->dropDownList([app\models\UserActivRecord::ROLE_ADMIN => app\models\UserActivRecord::ROLE_ADMIN, app\models\UserActivRecord::ROLE_USER => app\models\UserActivRecord::ROLE_USER]);?>
    <?= $form->field($model,'password', ['inputOptions'=>['placeholder'=>'Password']])->passwordInput(); ?>
    <?= $form->field($model,'confirmpassword', ['inputOptions'=>['placeholder'=>'Confirm password']])->passwordInput()->label('Confirm password'); ?>
	
    <div class="form-group">
        <div class="col-xs-8 col-md-9 col-lg-10">
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-xs-4 col-md-3 col-lg-2">
			<?= Html::button('Cancel', ['class' => 'cancel btn btn-default']) ?>
        </div>
    </div>
		
<?php ActiveForm::end(); ?>