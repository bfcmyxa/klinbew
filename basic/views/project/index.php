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
    <?= Html::a('<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
          Neues Projekt anlegen', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
