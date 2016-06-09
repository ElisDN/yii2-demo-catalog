<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $category app\models\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $category->name;

$this->params['breadcrumbs'][] = ['label' => 'Catalog', 'url' => ['index']];

$crumbs = [];
$parent = $category;
while ($parent = $parent->parent) {
    $crumbs[] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
}
$this->params['breadcrumbs'] = array_merge($this->params['breadcrumbs'], array_reverse($crumbs));

$this->params['breadcrumbs'][] = $this->title;
$this->params['category'] = $category;
?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_item',
    ]); ?>
</div>
