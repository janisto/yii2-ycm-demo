<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Common */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Common models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="common-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'slug',
            //'status',
            'title:ntext',
            'content:html',
            [
                'attribute' => 'picture',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => $model->getFileUrl('picture'),
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <p>
        Original image:<br>
        <?= Html::img($model->getFileUrl('picture')) ?>
    </p>

</div>
