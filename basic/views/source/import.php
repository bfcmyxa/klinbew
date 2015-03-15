<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $author[]  */

$this->title = 'Import Sources';
$this->params['breadcrumbs'][] = ['label' => 'Sources', 'url' => ['index', 'id' => $projectModel->projectid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-imnport">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textArea(['rows' => 30]) ?>

    <div class="form-group">
        <?= Html::submitButton('Import', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
