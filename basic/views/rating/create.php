<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Rating */
/* @var $source app\models\Source */

$this->title = 'Quelle bewerten';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['project/index']];
$this->params['breadcrumbs'][] = ['label' => $projectModel->title, 'url' => ['project/view', 'id' => $projectModel->projectid]];
$this->params['breadcrumbs'][] = ['label' => 'Literaturquellen', 'url' => ['source/index', 'id' => $projectModel->projectid]];
$label = 'Quelle mit der ID ' . $sourceModel->sourceId . ' bewerten';
$this->params['breadcrumbs'][] = $label;
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
        ],
    ]) ?>

</div>
