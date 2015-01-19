<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'authorId')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'sourceRatingId')->textInput() ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
