<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductTag */

$this->title = 'Create Product Tag';
$this->params['breadcrumbs'][] = ['label' => 'Product Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
