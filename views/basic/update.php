<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Basic */

$this->title = 'Update Basic: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
