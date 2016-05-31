<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Countries';
$this->params['breadcrumbs'][] = ['label' => $this->title,'url' => ['country/index']];
?>

<h1><?= Html::encode($this->title) ?></h1>

<ul>
<?php foreach ($countries as $country): ?>
    <li><?= Html::a(Html::encode("{$country->name} ({$country->code})"), ['country/details', 'id' => $country->code]) ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination, 'options' => ['class' => 'pagination pagination-sm']]) ?>