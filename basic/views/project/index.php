<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <?= Html::a('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
          Neues Projekt anlegen', ['create'], ['class' => 'btn btn-success btn-lg btn-block']) ?>
        </div>
        <div class="col-md-4">
        </div>

    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'projectid',
            'title',
            //'alias',
            'status',
            // 'createdBy',
            // 'creationDate',
            // 'modifyDate',
             'fileName',
             'productName',
            // 'dokumentVersion',
             'productVersion',
            // 'referenceProjectId',
             'productDescription',
            [
                'attribute' => 'edit_button',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Bearbeiten', ['view', 'id' => $model->projectid], ['class' => 'btn btn-primary']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>


