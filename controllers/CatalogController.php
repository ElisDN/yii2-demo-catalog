<?php

namespace app\controllers;

use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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
