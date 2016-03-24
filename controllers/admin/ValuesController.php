<?php

namespace app\controllers\admin;

use Yii;
use app\models\Value;
use app\models\admin\search\ValueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ValuesController implements the CRUD actions for Value model.
 */
class ValuesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Value models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ValueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Value model.
     * @param integer $product_id
     * @param integer $attribute_id
     * @return mixed
     */
    public function actionView($product_id, $attribute_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $attribute_id),
        ]);
    }

    /**
     * Creates a new Value model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @return mixed
     */
    public function actionCreate($product_id = null)
    {
        $model = new Value();
        $model->product_id = $product_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/products/view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Value model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $attribute_id
     * @return mixed
     */
    public function actionUpdate($product_id, $attribute_id)
    {
        $model = $this->findModel($product_id, $attribute_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/products/view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Value model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $attribute_id
     * @return mixed
     */
    public function actionDelete($product_id, $attribute_id)
    {
        $this->findModel($product_id, $attribute_id)->delete();

        return $this->redirect(['admin/products/view', 'id' => $product_id]);
    }

    /**
     * Finds the Value model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $attribute_id
     * @return Value the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $attribute_id)
    {
        if (($model = Value::findOne(['product_id' => $product_id, 'attribute_id' => $attribute_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
