<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RatingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ratingId') ?>

    <?= $form->field($model, 'ratedBy') ?>

    <?= $form->field($model, 'ratingDate') ?>

    <?= $form->field($model, 'evidenceValue') ?>

    <?= $form->field($model, 'relevanceValue') ?>

    <?php // echo $form->field($model, 'signValue') ?>

    <?php // echo $form->field($model, 'use') ?>

    <?php // echo $form->field($model, 'risk') ?>

    <?php // echo $form->field($model, 'evidenceText') ?>

    <?php // echo $form->field($model, 'relevanceText') ?>

    <?php // echo $form->field($model, 'signText') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
