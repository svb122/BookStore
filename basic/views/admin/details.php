<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]); ?>

    <?= $form->field($model, 'username');?>
    <?= $form->field($model, 'roleId');?>
		
<?php ActiveForm::end(); ?>