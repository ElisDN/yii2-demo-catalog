<?php

namespace app\widgets;

use app\models\Tag;
use yii\base\Widget;

class TagsWidget extends Widget
{
    /**
     * @var Tag
     */
    public $tag;

    public function run()
    {
        $items = [];

        foreach (Tag::find()->orderBy('name')->each() as $tag) {
            /** @var Tag $tag */
            $items[] = [
                'label' => $tag->name,
                'url' => ['/catalog/tag', 'tag' => $tag->name],
                'active' => $this->tag && $tag->id == $this->tag->id ? true : null,
            ];
        }

        return $this->render('tags', ['items' => $items]);
    }
} 