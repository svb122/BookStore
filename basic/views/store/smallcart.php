<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
	
        <?= Html::img('@web/images/shoppingcart.png', ['alt' => 'Cart']) ?><p><?php echo $cart->getCount();?></p>
