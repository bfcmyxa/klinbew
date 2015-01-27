<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Reference */
/* @var $projectModel app\models\Project */

$this->title = 'Create Reference';
$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-create">

    <h1><?= Html::encode($this->title) ?> zum Projekt: <?= Html::encode($projectModel->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= DetailView::widget([
        'model' => $projectModel,
        'attributes' => [
            'title',
            'status',
            'fileName',
            'productName',
            'dokumentVersion',
            'productVersion',
            'productDescription',
            //'projectid',
            //'referenceProjectId',
            //'modifyDate',
            //'creationDate',
            'createdBy',
            //'alias',
        ],
    ]) ?>

</div>
