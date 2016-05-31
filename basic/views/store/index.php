<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\ButtonDropdown;
$this->title = 'Book store';
$names = ArrayHelper::getColumn($names, 'name');
Url::remember();

?>

<div id="topfunctions" class="row">
    <!-- Single button -->
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Show books per page <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="<?= Url::toRoute(['store/index', 'id' => $category, 'items' => 8]); ?>">8 books</a></li>
            <li><a href="<?= Url::to(['store/index', 'id' => $category, 'items' => 16]); ?>">16 books</a></li>
            <li><a href="<?= Url::to(['store/index', 'id' => $category]); ?>">20 books</a></li>
        </ul>
    </div>
	
    <?= $this->render('_autocomplete', [
        'names' => $names,
        'model' => new \app\models\BookSearch(),
    ]);?>
</div>

<div class="cart">
    <a href="<?= Url::to(['store/cart']); ?>"><?php $this->beginContent('@app/views/store/smallcart.php', ['cart' => $cart,]); ?>
	<?php $this->endContent(); ?></a>
</div>



<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <?= Html::img('@web/'. Html::encode($book->imgsrc), ['alt' => $book->name]) ?>
                <div class="caption">
                    <h4><?php echo Html::encode($book->name);?></h4>
                    <p><?php echo $book->getCategoryName($book->category);?></p>
                    <div><p class='details btn btn-primary btn-sm' href="<?php echo Url::toRoute(['store/details', 'id' => $book->id]); ?>">Details</p><?php echo Html::a('Add to cart', ['store/add-to-cart', 'id' => $book->id], ['class' => 'btn btn-default btn-sm pull-right']) ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo LinkPager::widget([
    'pagination' => $pages,
]);?>

<?php Modal::begin([
    'id' => 'detailsModal',
    'header' => '<h3>Details</h3>',
]); Modal::end();?>