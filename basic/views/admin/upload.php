<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?= Html::img(Html::encode($img)) ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>

<button>Отправить</button>

<?php ActiveForm::end() ?>