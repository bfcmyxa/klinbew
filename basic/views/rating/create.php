<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Rating */
/* @var $source app\models\Source */

$this->title = 'Create Rating';
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= DetailView::widget([
        'model' => $sourceModel,
        'attributes' => [
            'sourceId',
            'type',
            'title',
            'year',
            'place',
            'publisher',
            'keywords',
            'text',
            'status',
            'summary',
        ],
    ]) ?>

</div>
