<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $tag app\models\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $tag->name;

$this->params['breadcrumbs'][] = ['label' => 'Catalog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['tag'] = $tag;
?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_item',
    ]); ?>
</div>
