<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Change Metadata', ['update', 'id' => $model->projectid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Produktbeschreibung', ['description', 'id' => $model->projectid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Referenzen', ['reference/index', 'id' => $model->projectid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Quellen', ['source/index', 'id' => $model->projectid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->projectid], [
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
            array("attribute" => "Some Test Field directly from view", "value" =>"Some test value"),
            //'alias',
        ],
    ]) ?>

</div>
