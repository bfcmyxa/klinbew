<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rating */

$this->title = 'Update Rating: ' . ' ' . $model->ratingId;
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ratingId, 'url' => ['view', 'id' => $model->ratingId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
