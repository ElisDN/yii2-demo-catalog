<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
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

    public function actionTag()
    {
        return $this->render('tag');
    }

    public function actionView()
    {
        return $this->render('view');
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
}
