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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_descrForm', [
        'model' => $model,
    ]) ?>

</div>
