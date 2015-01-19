<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reference */

$this->title = 'Update Reference: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->referenceId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
