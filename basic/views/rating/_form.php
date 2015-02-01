<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--
    <?=  $form->field($model, 'ratedBy')->textInput() ?>
    <?=  $form->field($model, 'ratingDate')->textInput() ?>
    -->

    <?= $form->field($model, 'evidenceValue')->textInput() ?>
    <?= $form->field($model, 'evidenceText')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'relevanceValue')->textInput() ?>
    <?= $form->field($model, 'relevanceText')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'signValue')->textInput() ?>
    <?= $form->field($model, 'signText')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'use')->textInput() ?>
    <?= $form->field($model, 'risk')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
