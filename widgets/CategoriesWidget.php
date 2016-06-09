<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    /**
     * @var Category
     */
    public $category;

    public function run()
    {
        $categories = Category::find()->orderBy('name')->all();

        $items = $this->getItemsRecursive($categories, null, $this->category);

        return $this->render('categories', [
            'items' => $items,
        ]);
    }

    /**
     * @var Category[] $categories
     * @param integer $parentId
     * @var Category $current
     * @return array
     */
    private function getItemsRecursive(&$categories, $parentId, $current)
    {
        $items = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $items[] = [
                    'label' => $category->name,
                    'url' => ['/catalog/category', 'id' => $category->id],
                    'active' => $this->category && $category->id == $this->category->id ? true : null,
                    'items' => $this->getItemsRecursive($categories, $category->id, $current),
                ];
            }
        }
        return $items;
    }
} 