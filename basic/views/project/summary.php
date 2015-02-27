<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1/22/2015
 * Time: 2:56 AM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zusammenfassung';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->projectid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-summary">









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
                    <?= Html::a('Change Metadata', ['update', 'id' => $model->projectid], ['class' => 'list-group-item ' ]) ?>
                    <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'list-group-item ']) ?>
                    <?= Html::a('Referenzen', ['reference/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Zusammenfassung', ['summary', 'id' => $model->projectid], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Exportieren', ['export', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                </div>
            </div>
            <div class="col-md-9">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'title',
                        'ratingSummary'
                    ],
                ]); ?>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'sourceSummary')->textArea(['rows' => 6])->label('    <h4>Alle Quellen zusammenfassen</h4>') ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <?= Html::a('Zurück zum Projekt', ['project/view', 'id' => $model->projectid], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                        </div>
                        <div class="col-lg-4">
                            <?= Html::a('Weiter ohne Änderung', ['export', 'id' => $model->projectid], ['class' => 'btn btn-default btn-lg btn-block']) ?>
                        </div>
                        <div class="col-lg-5">
                            <?= Html::submitButton('Speicher und zum Export', ['class' => 'btn btn-success btn-lg btn-block']) ?>
                        </div>
                    </div>

                </div>

                <?php ActiveForm::end(); ?>


            </div>
        </div>

    </div>

</div>
