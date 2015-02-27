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

$this->title = 'Export';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->projectid]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="project-summary">



    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <h1>Klinische Bewertung exportieren</h1>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <?= Html::a('Index', ['view', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Change Metadata', ['update', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Referenzen', ['reference/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Zusammenfassung', ['summary', 'id' => $model->projectid], ['class' => 'list-group-item']) ?>
                <?= Html::a('Exportieren', ['export', 'id' => $model->projectid], ['class' => 'list-group-item active']) ?>
            </div>
        </div>
        <div class="col-md-6">

            <p><h3>Sie haben es fast geschafft!</h3></p>

            <p>
                Hier können Sie die Vorlage für Ihre klinische Bewertung runterladen.
                Die vorlage beinhalten die Informationen über Ihres Produkt und von Ihnen eingegebene und bewertete Literaturquellen.
            </p>
            <?= Html::a('Download in .doc', ['msword', 'id' => $model->projectid], ['class' => 'btn btn-success btn-lg ', 'target' => '_blank']) ?>




        </div>
    </div>

</div>