<?php

use app\models\Attribute;
use app\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'product_id',
            [
                'attribute' => 'attribute_id',
                'filter' => Attribute::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'productAttribute.name',
            ],
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
