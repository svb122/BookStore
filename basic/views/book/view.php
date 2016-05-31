<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['id' => 'detailbook', 'class' => 'table table-striped table-bordered detail-view'],
        'template' => '<tr><th class="attrcell">{label}</th><td>{value}</td></tr>',
        'attributes' => [
        [
            'attribute' => 'imgsrc',
            'format' => 'html',
            'value' => Html::img('@web/' . Html::encode($model->imgsrc),['alt' => $model->name, 'title' => $model->name, 'width' => '80px'])
            . Html::a('Update image', ['book/update-image', 'id' => $model->id], ['class' => 'updateimg btn btn-warning']),
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
