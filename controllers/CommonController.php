<?php

namespace app\controllers;

use Yii;
use app\models\Common;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CommonController implements the basic actions for Common model.
 */
class CommonController extends Controller
{
    /**
     * Lists all Common models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $models = Common::find()->where('status=:status', [':status' => Common::STATUS_VISIBLE])->all();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $models,
            'sort' => [
                'attributes' => ['id', 'slug', 'title', 'content', 'picture'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'models' => $models,
        ]);
    }

    /**
     * Displays a single Common model.
     *
     * @param string $slug
     * @return mixed
     */
    public function actionView($slug)
    {
        $model = $this->findCommon($slug);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Common model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $slug
     * @return Common the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCommon($slug)
    {
        if (($model = Common::findOne(['slug' => $slug, 'status' => Common::STATUS_VISIBLE])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
