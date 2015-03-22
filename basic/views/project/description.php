<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1/22/2015
 * Time: 2:56 AM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Produktbeschreibung';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->projectid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-description">
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
                    <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'list-group-item active']) ?>
                    <?= Html::a('Relevante Dokumente', ['reference/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Zusammenfassung', ['summary', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                    <?= Html::a('Exportieren', ['export', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                </div>
            </div>
            <div class="col-md-9">




                <?= $this->render('_descrForm', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>

    </div>
</div>
<br>
<br>
