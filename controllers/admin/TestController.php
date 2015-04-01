<?php

namespace app\controllers\admin;

use Yii;
use janisto\ycm\controllers\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return in_array(Yii::$app->user->identity->username, $this->module->admins);
                        }
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('@app/views/admin/test/index');
    }

    public function actionView() {
        return $this->render('@app/views/admin/test/view');
    }
}
