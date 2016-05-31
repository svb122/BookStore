<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Create Order';
?>
<div class="order-create">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Dear customer
    </div>
    <div class="panel-body">Thanks for chosing our store. Your order is <strong>successfully created</strong>. If you want to continue shopping <?= Html::a('click here', ['store/index']) ?></div>
  </div>
</div>
