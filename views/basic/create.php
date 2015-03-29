<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Basic */

$this->title = 'Create Basic';
$this->params['breadcrumbs'][] = ['label' => 'Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
