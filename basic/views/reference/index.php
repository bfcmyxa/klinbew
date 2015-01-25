<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Referenzierte Dokumenten';
$this->params['breadcrumbs'][] = 'Referenzen';
?>
<div class="reference-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
    <p>
        Typische notwendige Dokumenten sind z.B. Zweckbestimmung, Risikoanalyse, SOP, Glossar
    </p>
    <br>

    <p>
        <?= Html::a('Create Reference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'referenceId',
            'name',
            'file',
            'version',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?= Html::a('Back to Projects', ['project/index'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-6">
            </div>
            <div class="col-lg-3">
                <?= Html::a('Weiter', ['source/index'], ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>

    </div>


</div>
