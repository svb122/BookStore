<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $form yii\widgets\ActiveForm */
?>

<div class="pull-right btn-group autocomplete">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-inline'],
        'action' => ['find-books'],
        'method' => 'get',
    ]); ?>
	
	    <div class="col-lg-6">
            <div class="input-group">
                <?= $form->field($model, 'name')->widget(
                AutoComplete::className(), [           
                    'clientOptions' => [
                        'source' => $names,
                    ],
                    'options'=>[
                        'class' => 'form-control',
                        'placeholder' => 'Search',
                    ]
                ])->label(false); ?>
                <span class="input-group-btn">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-default']) ?>
                </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
  
    <?php ActiveForm::end(); ?>

</div>
