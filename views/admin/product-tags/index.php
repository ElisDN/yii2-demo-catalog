<?php

use app\models\Product;
use app\models\Tag;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ProductTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'product_id',
                'filter' => Product::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'product.name',
            ],
            [
                'attribute' => 'tag_id',
                'filter' => Tag::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'tag.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
