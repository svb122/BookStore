<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ISBN') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'publishing') ?>

    <?= $form->field($model, 'year') ?>
	
    <?= $form->field($model, 'authors') ?>
	
    <?= $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'countpages') ?>

    <?php // echo $form->field($model, 'authors') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'bookdescribe') ?>

    <?php // echo $form->field($model, 'imgsrc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
