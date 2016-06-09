<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Catalog', 'url' => ['index']];

$crumbs = [];
$parent = $model->category;
$crumbs[] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
while ($parent = $parent->parent) {
    $crumbs[] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
}
$this->params['breadcrumbs'] = array_merge($this->params['breadcrumbs'], array_reverse($crumbs));

$this->params['breadcrumbs'][] = $this->title;
$this->params['category'] = $model->category;
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'category_id',
                        'value' => ArrayHelper::getValue($model, 'category.name'),
                    ],
                    'name',
                    'price',
                    [
                        'label' => 'Tags',
                        'value' => implode(', ', ArrayHelper::map($model->tags, 'id', 'name')),
                    ],
                ],
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => new ActiveDataProvider(['query' => $model->getValues()]),
                'layout' => "{items}\n{pager}",
                'columns' => [
                    [
                        'attribute' => 'attribute_id',
                        'value' => 'productAttribute.name',
                    ],
                    'value',
                ],
            ]); ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <?= Yii::$app->formatter->asNtext($model->content) ?>
        </div>
    </div>

</div>
