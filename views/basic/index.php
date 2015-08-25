<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BasicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basic models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title:ntext',
            'content:html',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['view', 'id' => $model->id]), [
                            'title' => 'View ' . $model->title,
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
