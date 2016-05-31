<?php
use yii\helpers\Html;
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Countries','url' => ['country/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Details</h1>
<p>The population of <?=Html::tag('strong',Html::encode($this->title))?> is <?= Html::tag('strong', Html::encode($model->population)) ?>.</p>
<?= Html::a('Назад', $page,['class' => 'btn btn-default']) ?>