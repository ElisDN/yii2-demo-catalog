<?php

use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $items array */

?>

<div class="panel panel-default">
    <div class="panel-heading">Категории</div>
    <?= Menu::widget([
        'options' => ['class' => 'nav nav-pills nav-stacked'],
        'items' => $items,
        'submenuTemplate' => "\n<ul class='nav nav-pills nav-stacked'>\n{items}\n</ul>\n"
    ]); ?>
</div>



 