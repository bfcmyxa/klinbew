<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferenceSearch */
/* @var $projectModel app\models\Project */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $refdocsData yii\data\ActiveDataProvider */

$this->title = 'Relevante Dokumente';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $projectModel->title, 'url' => ['project/view', 'id' => $projectModel->projectid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
    <p>
        Typische notwendige Dokumente sind z.B. Zweckbestimmung, Risikoanalyse, SOP, Glossar
    </p>
    <br>

    <p>
        <?= Html::a('Neues Dokument hinzufügen', ['create', 'id' => $projectModel->projectid ], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'referenceId',
            'name',
            'file',
            'version',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <br>

    <!--
     GridView::widget([
        'dataProvider' => $refdocsData,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'referenceId',
            'projectId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    -->
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


    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?= Html::a('Zurück zum Projekt', ['project/view', 'id' => $projectModel->projectid], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-5">
            </div>
            <div class="col-lg-4">
                <?= Html::a('Weiter zu Quellen', ['source/index', 'id' => $projectModel->projectid], ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>

    </div>
</div>
