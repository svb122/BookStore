<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'update-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false);?>
    <?= $form->field($model, 'username');?>
    <?= $form->field($model, 'roleId')->dropDownList([$model->getAdminRole() => $model->getAdminRole(), $model->getUserRole() => $model->getUserRole()]);?>
	
    <div class="form-group">
        <div class="col-xs-8 col-md-9 col-lg-10">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-xs-4 col-md-3 col-lg-2">
			<?= Html::button('Cancel', ['class' => 'cancel btn btn-default']) ?>
        </div>
    </div>
		
<?php ActiveForm::end(); ?>