<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'projectid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'creationDate') ?>

    <?php // echo $form->field($model, 'modifyDate') ?>

    <?php // echo $form->field($model, 'fileName') ?>

    <?php // echo $form->field($model, 'productName') ?>

    <?php // echo $form->field($model, 'dokumentVersion') ?>

    <?php // echo $form->field($model, 'productVersion') ?>

    <?php // echo $form->field($model, 'referenceProjectId') ?>

    <?php // echo $form->field($model, 'productDescription') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
