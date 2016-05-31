<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Cart';
?>

<h1><?php echo  $this->title; ?></h1>

<table class="table">
    <thead><tr><th>Quantity</th><th>Book</th><th><?php echo Html::a('Clear cart', ['store/clear-cart'], ['class' => 'btn btn-danger btn-sm']) ?></th></tr></thead>
	
    <tbody>
        <?php foreach ($cart->getPositions() as $book): ?>
            <tr>
                <td><?php echo $book->getQuantity();?></td> <td><?php echo $book->name;?></td> <td><?php echo Html::a('Remove from cart', ['store/remove-item', 'id' => $book->id], ['class' => 'btn btn-danger btn-sm']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
	
    <tfoot>
        <tr><th>In total: <?php echo $cart->getCount();?> books</th><th></th><th></th></tr>
    </tfoot>
    

</table>

<div class="text-center">
    <?php echo Html::a('Continue shopping', ['store/index'], ['class' => 'btn btn-primary btn-sm']) ?>
    <?php echo Html::a('Checkout', ['order/create'], ['class' => 'btn btn-info btn-sm']) ?>
</div>