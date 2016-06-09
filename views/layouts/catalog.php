<?php

use app\widgets\CategoriesWidget;
use app\widgets\TagsWidget;

/* @var $this \yii\web\View */

/* @var $content string */

?>
<?php $this->beginContent('@app/views/layouts/layout.php'); ?>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4">

            <?= CategoriesWidget::widget([
                'category' => isset($this->params['category']) ? $this->params['category'] : null,
            ]) ?>
            
            <?= TagsWidget::widget([
                'tag' => isset($this->params['tag']) ? $this->params['tag'] : null,
            ]) ?>

        </div>
        <div class="col-lg-9 col-md-9 col-sm-8">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent() ?>
