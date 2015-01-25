<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reference */

$this->title = 'Referenzierte Dokumenten';
$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Referenzen';
?>
<div class="reference-view">

    <h2><?= Html::encode($this->title) ?></h2>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->referenceId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->referenceId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'referenceId',
            'name',
            'file',
            'version',
        ],
    ]) ?>

</div>
