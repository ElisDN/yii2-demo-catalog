<?php

use app\models\Tag;
use yii\bootstrap\Nav;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $items array */
/* @var $activeTag Tag */

?>

<div class="panel panel-default">
    <div class="panel-heading">Метки</div>
    <?= Nav::widget([
        'options' => ['class' => 'nav nav-pills nav-stacked'],
        'items' => $items,
    ]); ?>
</div>


 