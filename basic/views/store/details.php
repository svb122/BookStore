<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $model->name;
?>
<div class="book-view">

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['id' => 'detailbook', 'class' => 'table table-striped table-bordered detail-view'],
        'template' => '<tr><th class="attrcell">{label}</th><td>{value}</td></tr>',
        'attributes' => [
        [
            'attribute' => 'imgsrc',
            'format' => 'html',
            'value' => Html::img('@web/' . Html::encode($model->imgsrc),['alt' => $model->name, 'title' => $model->name, 'width' => '80px'])
        ],
            'ISBN',
            'name',
            'publishing',
            'year',
            'countpages',
            'authors',
            ['attribute' => 'category', 'format' => 'html', 'value' => $model->getCategoryName($model->category)],
            'bookdescribe:ntext',
        ],
    ]) ?>

</div>
