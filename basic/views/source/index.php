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
            // 'status',
            // 'sourceRatingId',
            // 'summary',

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
