<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public $layout = 'catalog';

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->active()->orderBy(['id' => SORT_DESC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCategory($id)
    {
        $category = $this->findCategoryModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->active()->forCategory($category->id)->orderBy(['id' => SORT_DESC]),
        ]);

        return $this->render('category', [
            'category' => $category,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTag($tag)
    {
        $tag = $this->findTagModel($tag);

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->active()->forTag($tag->id)->orderBy(['id' => SORT_DESC]),
        ]);

        return $this->render('tag', [
            'tag' => $tag,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findProductModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCategoryModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param string $name
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTagModel($name)
    {
        if (($model = Tag::findOne(['name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProductModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
