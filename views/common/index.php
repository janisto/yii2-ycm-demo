<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */
/* @var $models app\models\Common[] */

$this->title = 'Common models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="common-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'slug',
            'title',
            'content:html',
            [
                'attribute' => 'picture',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($model) {
                    return $model->getFileUrl('picture');
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['common/view', 'slug' => $model->slug]), [
                            'title' => 'View ' . $model->title,
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
