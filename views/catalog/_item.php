<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$tagLinks = [];
foreach ($model->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'tag' => $tag->name]);
}

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right"><?= $model->price ?></span>
        <?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id]) ?>
    </div>
    <div class="panel-body">
        <p>Category: <?= $model->category ? Html::a(Html::encode($model->category->name), ['category', 'id' => $model->category->id]) : 'Без категории' ?></p>
        <?php if ($tagLinks): ?>
            <p>Tags: <?= implode(', ', $tagLinks) ?></p>
        <?php endif; ?>
        <div><?= Yii::$app->formatter->asNtext($model->content) ?></div>
    </div>
</div>