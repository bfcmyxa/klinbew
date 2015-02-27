<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-view">
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
                    <?= Html::a('Index', ['view', 'id' => $model->projectid], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Change Metadata', ['update', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Referenzen', ['reference/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Zusammenfassung', ['summary', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Exportieren', ['export', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                </div>
            </div>
            <div class="col-md-9">




                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        'status',
                        'fileName',
                        'productName',
                        'dokumentVersion',
                        'productVersion',
                        'productDescription',
                        'sourceSummary',
                        //'projectid',
                        //'referenceProjectId',
                        //'modifyDate',
                        //'creationDate',
                        'createdBy',
                        array("attribute" => "Some Test Field directly from view", "value" =>"Some test value"),
                        //'alias',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
            </div>
            <div class="col-md-1">
                <p>
                    <?= Html::a('Delete', ['delete', 'id' => $model->projectid], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>
        </div>

    </div>


    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?= Html::a('Zurück zu Projekte', ['project/index'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-5">
            </div>
            <div class="col-lg-4">
                <?= Html::a('Weiter zu Metadata', ['project/update', 'id' => $model->projectid], ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>

    </div>




</div>
