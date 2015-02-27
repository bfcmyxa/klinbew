<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Change Metadata: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->projectid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-update">


    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?= Html::a('Index', ['view', 'id' => $model->projectid], ['class' => 'list-group-item ']) ?>
                <?= Html::a('Change Metadata', ['update', 'id' => $model->projectid], ['class' => 'list-group-item active' ]) ?>
                <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Referenzen', ['reference/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Zusammenfassung', ['summary', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Exportieren', ['export', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
            </div>
        </div>
        <div class="col-md-9">




            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>


    <br>
    <br>


    </div>

</div>
