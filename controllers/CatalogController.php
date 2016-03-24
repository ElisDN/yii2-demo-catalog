<?php

namespace app\controllers;

use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

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

    public function actionCategory()
    {
        return $this->render('category');
    }

    public function actionTag()
    {
        return $this->render('tag');
    }

    public function actionView()
    {
        return $this->render('view');
    }
}
