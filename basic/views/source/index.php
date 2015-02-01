<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $projectModel app\models\Project */
/* @var $searchModel app\models\SourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $srcprojData yii\data\ActiveDataProvider */

$this->title = 'Literaturquellen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Neue Quelle hinzufügen', ['create', 'id' => $projectModel->projectid ], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            'title',
            'year',
            'place',
            'publisher',
            //'sourceId',
            //'authorId',
            // 'keywords',
            // 'text',
            // 'sourceRatingId',
            // 'summary',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        //return rated
                        return Html::tag('div', 'Bewertet', ['class' => 'btn btn-success']);
                    } else {
                        //return not rated
                        return Html::tag('div', 'Nicht Bewertet' , ['class' => 'btn btn-danger']);
                    }
                },
            ],
            [
                'attribute' => 'rate_button',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Bewerten', ['rating/create', 'sourceId' => $model->sourceId, 'projectId' => $_GET['id'] ], ['class' => 'btn btn-primary']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $srcprojData,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'projectId',
            'sourceId',
            'ratingId',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

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
