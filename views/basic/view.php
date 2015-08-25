<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Basic */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Basic model', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            'content:html',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
