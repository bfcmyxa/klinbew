<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $authorModels[] */


$this->title = 'Neue Quelle hinzufügen';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['project/index']];
$this->params['breadcrumbs'][] = ['label' => $projectModel->title, 'url' => ['project/view', 'id' => $projectModel->projectid]];
$this->params['breadcrumbs'][] = ['label' => 'Literaturquellen', 'url' => ['index', 'id' => $projectModel->projectid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authorModels' => $authorModels
    ]) ?>

</div>
