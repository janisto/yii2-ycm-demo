<?php

namespace app\controllers;

use Yii;
use app\models\Basic;
use app\models\BasicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BasicController implements the basic actions for Basic model.
 */
class BasicController extends Controller
{
    /**
     * Lists all Basic models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BasicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Basic model.
     *
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Basic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return Basic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Basic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
