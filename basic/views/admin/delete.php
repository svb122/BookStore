<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = "Delete user";
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h4>Are you sure you want to delete this user?</h4>

<div class="row">
    <div class="col-xs-8 col-md-9 col-lg-10">
        <?= Html::a('Confirm', ['admin/delete','id' => $id, 'confirm' => false], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="col-xs-4 col-md-3 col-lg-2">
        <?= Html::button('Cancel', ['class' => 'cancel btn btn-default']) ?>
    </div>
</div>